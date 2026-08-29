<?php

final class Database
{
    private static $connection;

    private function __construct()
    {
    }

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $host = self::requiredEnvironmentVariable('DB_HOST');
        $database = self::requiredEnvironmentVariable('DB_NAME');
        $user = self::requiredEnvironmentVariable('DB_USER');
        $password = self::requiredEnvironmentVariable('DB_PASSWORD');
        $port = getenv('DB_PORT') ?: '3306';

        if (!ctype_digit((string) $port)) {
            throw new RuntimeException('DB_PORT deve conter apenas números.');
        }

        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
            $host,
            $port,
            $database
        );

        try {
            self::$connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $exception) {
            error_log('Falha ao conectar ao banco: ' . $exception->getCode());
            throw new RuntimeException('Não foi possível conectar ao banco de dados.');
        }

        return self::$connection;
    }

    private static function requiredEnvironmentVariable(string $name): string
    {
        $value = getenv($name);

        if ($value === false || trim($value) === '') {
            throw new RuntimeException("Variável de ambiente obrigatória ausente: {$name}");
        }

        return $value;
    }
}
