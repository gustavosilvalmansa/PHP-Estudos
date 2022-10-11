<?php

header("Content-type: image/jpeg");

$file = "wallpaper.jpg";

$new_width = 256;
$new_height = 256;

//$data = getimagesize($file);

list($old_width, $old_height ) = getimagesize($file);

$new_image = imagecreatetruecolor($new_width,$new_height);
$old_image = imagecreatefromjpeg($file);

imagecopyresampled($new_image, $old_image,0,0,0,0, $new_width, $new_height, $old_width, $old_height); 
//(destiny, source,dest x,dest y, origin_x, origin_y, dest_width, dest_height, org_width, org_height)
imagejpeg($new_image);
imagedestroy($new_image);

?>