<?php
$img = imagecreatefromjpeg("sample.jpg");
$color = imagecolorallocate($img, 0, 0, 255);
imagestring($img, 5, 10, 10, "VIT Chennai", $color);
header("Content-type:image/jpeg");
imagejpeg($img);
imagedestroy($img);
?>
