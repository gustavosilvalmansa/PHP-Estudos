<?php
$FECHA_SINIESTRO = "2023-06-03";

// Create a DateTime object with the input string
$date = DateTime::createFromFormat('Y-m-d', $FECHA_SINIESTRO);

// Check if the date is valid
if ($date && $date->format('Y-m-d') === $FECHA_SINIESTRO) {
    echo "Valid date: " . $date->format('Y-m-d');
} else {
    echo "Invalid date";
}