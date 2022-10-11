<?php

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);]

//O imagettftext possui um __DIR__.DIRECTORY_SEPARATOR, porque sem ele daria um erro no código
imagettftext($image, 32, 0, 320, 250, $titleColor, __DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf", "CERTIFICADO");
imagettftext($image, 32, 0, 375, 350, $titleColor, __DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf", "Gustavo Almansa");
imagestring($image, 3, 440, 370, utf8_decode("Concluído em.").date("d/m/Y"), $titleColor);

header("Content-Type: image/jpeg");

imagejpeg($image);

imagedestroy($image);

?>