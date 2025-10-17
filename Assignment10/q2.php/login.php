<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit();
}

$message = '';

if($_SERVER['REQUEST_METHOD']== 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if($user === "admin" && $pass = "1234"){
        $_SESSION['user'] = 'admin';
        header("Location: welcome.php");
        exit();
    } else {
        $message = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($message): ?>
        <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Username: <input type="text" name="user" required /></label><br /><br />
        <label>Password: <input type="password" name="pass" required /></label><br /><br />
        <button type="submit">Login</button>
    </form>
</body>
</html>