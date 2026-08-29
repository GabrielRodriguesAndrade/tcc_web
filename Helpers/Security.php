<?php

final class Security
{
    private static $nonce;

    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'httponly' => true,
                'secure' => self::isHttps(),
                'samesite' => 'Strict',
            ]);
            session_start();
        }
    }

    public static function sendHeaders(): void
    {
        $nonce = self::nonce();
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: DENY');
        header('Referrer-Policy: no-referrer');
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-{$nonce}' https://www.gstatic.com https://www.google.com; style-src 'self' 'unsafe-inline'; img-src 'self' data:; frame-ancestors 'none'; base-uri 'self'; form-action 'self'");
    }

    public static function escape($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    public static function csrfToken(): string
    {
        self::startSession();

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public static function nonce(): string
    {
        if (self::$nonce === null) {
            self::$nonce = base64_encode(random_bytes(16));
        }

        return self::$nonce;
    }

    public static function requireValidCsrfToken(): void
    {
        self::startSession();
        $provided = $_POST['csrf_token'] ?? '';
        $stored = $_SESSION['csrf_token'] ?? '';

        if ($stored === '' || !is_string($provided) || !hash_equals($stored, $provided)) {
            http_response_code(403);
            throw new RuntimeException('Requisição inválida.');
        }
    }

    public static function requireAccessToken(): void
    {
        $expected = getenv('APP_ACCESS_TOKEN');
        if ($expected === false || strlen($expected) < 32) {
            http_response_code(500);
            throw new RuntimeException('APP_ACCESS_TOKEN não está configurado com segurança.');
        }

        $authorization = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        $prefix = 'Bearer ';
        $bearerToken = strncmp($authorization, $prefix, strlen($prefix)) === 0
            ? substr($authorization, strlen($prefix))
            : '';
        $provided = $bearerToken !== ''
            ? $bearerToken
            : ($_SERVER['PHP_AUTH_PW'] ?? '');

        if ($provided === '' || !hash_equals($expected, $provided)) {
            header('WWW-Authenticate: Basic realm="IngaDrive", charset="UTF-8"');
            http_response_code(401);
            exit('Não autorizado.');
        }
    }

    private static function isHttps(): bool
    {
        return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    }
}
