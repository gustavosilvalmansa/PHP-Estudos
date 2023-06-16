<?php
function getMonthName($monthNumber) {
    $monthNames = array(
        1 => 'janeiro',
        2 => 'fevereiro',
        3 => 'março',
        4 => 'abril',
        5 => 'maio',
        6 => 'junho',
        7 => 'julho',
        8 => 'agosto',
        9 => 'setembro',
        10 => 'outubro',
        11 => 'novembro',
        12 => 'dezembro'
    );

    // Remove leading zeros if present
    $monthNumber = ltrim($monthNumber, '0');

    return $monthNames[(int)$monthNumber];
}

$monthNumber = '08';
$monthName = getMonthName($monthNumber);
echo $monthName;  // Output: agosto