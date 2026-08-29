<?php

class Hash
{
    public static function transformaSenha($senha, &$saltBase, &$hashBase)
    {
        if (!is_string($senha) || strlen($senha) < 12) {
            throw new InvalidArgumentException('A senha deve possuir pelo menos 12 caracteres.');
        }

        $hashBase = password_hash($senha, PASSWORD_DEFAULT);
        $saltBase = null;

        return $hashBase;
    }

    public static function verificaSenha($senhaDigitada, $storedHash, $storedSalt = null)
    {
        return is_string($storedHash) && password_verify($senhaDigitada, $storedHash);
    }
}
