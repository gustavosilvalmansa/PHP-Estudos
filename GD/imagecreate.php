<?php

header("Content-type: image/png");

$image = imagecreate(256,256);

$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0); // (img, red, green, blue)

imagestring($image, 5, 60, 120, "Curso PHP 7", $red); //(image, font, x , y , text, color);

imagepng($image);

imagedestroy($image);



?>