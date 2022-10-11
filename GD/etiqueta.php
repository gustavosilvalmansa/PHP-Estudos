<?php
$pedido = mt_rand(3000,30000);
$image = imagecreatefromjpeg("etiqueta.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

//O imagettftext possui um __DIR__.DIRECTORY_SEPARATOR, porque sem ele daria um erro no código

imagettftext($image, 32, 0, 180, 220, $titleColor, __DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf", "PEDIDO: ".$pedido);

header("Content-Type: image/jpeg");

imagejpeg($image);

imagedestroy($image);

?>