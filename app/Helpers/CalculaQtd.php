<?php

namespace App\Helpers;

class CalculaQtd
{
    public static function Calcular(int $qtd1, int $qtd2)
    {
        // condicional, se o usuario digitar um valor menor no qtd2 a quantidade de ambos será zero
        // a QTD2 nunca deverá ser menor que a QTD1
        if ($qtd2 < $qtd1) {
            $qtd1 = 0;
            $qtd2 = 0;
        }

        // calculo que retorna o calculo
        return $qtd2 - $qtd1;
    }
}