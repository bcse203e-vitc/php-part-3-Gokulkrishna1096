<?php
$img = imagecreate(200, 200);

$bg = imagecolorallocate($img, 255, 255, 255);

$red = imagecolorallocate($img, 255, 0, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
$green = imagecolorallocate($img, 0, 255, 0);
$black = imagecolorallocate($img, 0, 0, 0);

imagerectangle($img, 50, 50, 150, 150, $red);

imagefilledrectangle($img, 20, 20, 60, 60, $blue);

imagefilledellipse($img, 100, 100, 120, 80, $green);

imageline($img, 0, 0, 200, 200, $black);

imagestring($img, 5, 60, 170, "PHP GD", $black);

header("Content-type: image/png");

imagepng($img);

imagedestroy($img);
?>
