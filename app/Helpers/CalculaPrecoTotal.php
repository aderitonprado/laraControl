<?php

namespace App\Helpers;

class CalculaPrecoTotal
{
    public static function CalcularTotal(int $qtd, $preco)
    {

        // calculo que retorna o calculo
        return ($preco * $qtd);
    }
}