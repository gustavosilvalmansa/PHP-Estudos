<?php

function numeroPorExtenso($numero) {
    $unidades = array('', 'um', 'dois', 'três', 'quatro', 'cinco', 'seis', 'sete', 'oito', 'nove');
    $dezenas = array('', 'dez', 'vinte', 'trinta', 'quarenta', 'cinquenta', 'sessenta', 'setenta', 'oitenta', 'noventa');
    $centenas = array('', 'cento', 'duzentos', 'trezentos', 'quatrocentos', 'quinhentos', 'seiscentos', 'setecentos', 'oitocentos', 'novecentos');

    $numero = str_pad($numero, 3, '0', STR_PAD_LEFT);

    $extenso = '';

    if ($numero == '1000') {
        return 'mil';
    }

    $centena = substr($numero, 0, 1);
    $dezena = substr($numero, 1, 1);
    $unidade = substr($numero, 2, 1);

    if ($centena != '0') {
        $extenso .= $centenas[$centena] . ' e ';
    }

    if ($dezena == '1') {
        $extenso .= $unidades[$unidade + 1];
    } else {
        $extenso .= $dezenas[$dezena];
        if ($unidade != '0') {
            $extenso .= ' e ' . $unidades[$unidade];
        }
    }

    return $extenso;
}

$numero = 720;
$extenso = numeroPorExtenso($numero);
echo $extenso; // Output: setecentos e vinte
