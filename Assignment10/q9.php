<?php
$img = imagecreate(250, 250);
for ($i = 0; $i < 10; $i++) {
    $color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefilledellipse($img, rand(20, 200), rand(20, 200), 50, 50, $color);
}
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
