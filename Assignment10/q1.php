<?php
ob_start();

if (isset($_COOKIE['visits'])) {
    $count = $_COOKIE['visits'] + 1;
} else {
    $count = 1;
}

setcookie('visits', $count, time() + 3600);

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visit Counter</title>
</head>
<body>
    <h1>Welcome!</h1>
    <p>You have visited this page <?php echo $count; ?> times.</p>
</body>
</html>

