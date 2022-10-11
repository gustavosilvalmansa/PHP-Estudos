<?php


$image = imagecreatefromjpeg("certificado.jpg");//criar a partir de um jpg

$titleColor = imagecolorallocate($image, 0,0,0);

$gray = imagecolorallocate($image, 100,100,100);

imagestring($image,5,450,450, "Certificado", $titleColor);

imagestring($image,5,440,350, "Gustavo Almansa", $titleColor);

imagestring($image,3,440,370, "Concluido em: ".date("d/m/Y"), $gray);

header("Content-type: image/jpeg");

imagejpeg($image, "certificado".date("Y-m-d").".jpg", 10); //(image, name, quality)

imagedestroy($image);


?>