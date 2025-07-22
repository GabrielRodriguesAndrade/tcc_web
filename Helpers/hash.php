<?php

class Hash
{
    /**
     * Gera o hash da senha com salt e retorna ambos em Base64.
     *
     * @param string $senha A senha original.
     * @param string &$saltBase Salt em Base64 (retorno por referência).
     * @param string &$hashBase Hash em Base64 (retorno por referência).
     * @return string Hash gerado em Base64.
     */
    public static function transformaSenha($senha, &$saltBase, &$hashBase)
    {
        // Salt aleatório de 16 bytes
        $saltBytes = random_bytes(16);
        $saltBase = base64_encode($saltBytes);

        // Hash PBKDF2 com SHA-1, 10000 iterações, 20 bytes
        $hash = hash_pbkdf2("sha1", $senha, $saltBytes, 10000, 20, true);
        $hashBase = base64_encode($hash);

        return $hashBase;
    }

    /**
     * Verifica se a senha digitada gera o mesmo hash com o salt armazenado.
     *
     * @param string $senhaDigitada Senha digitada pelo usuário.
     * @param string $storedHash Hash armazenado (Base64).
     * @param string $storedSalt Salt armazenado (Base64).
     * @return bool true se a senha estiver correta, false caso contrário.
     */
    public static function verificaSenha($senhaDigitada, $storedHash, $storedSalt)
    {
        $saltBytes = base64_decode($storedSalt);
        $hash = hash_pbkdf2("sha1", $senhaDigitada, $saltBytes, 10000, 20, true);
        $hashBase = base64_encode($hash);

        return hash_equals($hashBase, $storedHash);
    }
}
