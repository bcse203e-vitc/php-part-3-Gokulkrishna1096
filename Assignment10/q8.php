<?php
$src = imagecreatefromjpeg("image.jpg");

list($width, $height) = getimagesize("image.jpg");

$new_width = 200;

$new_height = floor($height * ($new_width / $width));

$new_image = imagecreatetruecolor($new_width, $new_height);

imagecopyresampled($new_image, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

header("Content-type: image/jpeg");
imagejpeg($new_image);

imagedestroy($src);
imagedestroy($new_image);
?>
