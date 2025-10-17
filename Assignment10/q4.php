<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['verify'])) {
    $captcha = rand(1000, 9999);

    $_SESSION['captcha'] = $captcha;

    $image = imagecreate(70, 30);

    $bg = imagecolorallocate($image, 255, 255, 255);
    $text = imagecolorallocate($image, 0, 0, 0);

    imagestring($image, 5, 10, 5, $captcha, $text);

    header("Content-type: image/png");

    imagepng($image);

    imagedestroy($image);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha']) {
        echo "CAPTCHA Verified Successfully!";
    } else {
        echo "Incorrect CAPTCHA. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA Verification</title>
</head>
<body>
    <h1>CAPTCHA Verification</h1>

    <form action="" method="POST">
        <label for="captcha">Enter the CAPTCHA:</label><br>
        <img src="captcha.php" alt="CAPTCHA Image"><br><br>
        <input type="text" name="captcha" id="captcha" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <br><br>
    <p><a href="captcha.php">Refresh CAPTCHA</a></p>
</body>
</html>
