<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remember'])) {
        setcookie('username', $_POST['username'], time() + 3600 * 24, "/");
    }
}

$username = $_COOKIE['username'] ?? 'Guest';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <p>Welcome <?php echo htmlspecialchars($username); ?></p>

    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <br><br>

        <label for="remember">Remember Me:</label>
        <input type="checkbox" name="remember" id="remember">

        <br><br>

        <input type="submit" value="Login">
    </form>

    <br>
    <p><a href="?logout">Logout</a></p>
</body>
</html>

<?php
if (isset($_GET['logout'])) {
    setcookie('username', '', time() - 3600, "/");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
