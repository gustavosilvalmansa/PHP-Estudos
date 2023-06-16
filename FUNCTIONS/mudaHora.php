<?php

function changeHour($hour) {
    $hourMap = array(
        '00' => 12, '01' => 1, '02' => 2, '03' => 3, '04' => 4, '05' => 5,
        '06' => 6, '07' => 7, '08' => 8, '09' => 9, '10' => 10, '11' => 11,
        '12' => 12, '13' => 1, '14' => 2, '15' => 3, '16' => 4, '17' => 5,
        '18' => 6, '19' => 7, '20' => 8, '21' => 9, '22' => 10, '23' => 11
    );

    // Remove leading zeros if present
    $hour = ltrim($hour, '0');

    return isset($hourMap[$hour]) ? $hourMap[$hour] : null;
}

$hour = '14';
$changedHour = changeHour($hour);
echo $changedHour;  // Output: 2