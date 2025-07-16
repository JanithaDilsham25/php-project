<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // You should hash and check password properly
    if ($user === "admin" && $pass === "1234") {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <form method="POST">
        <h2>Login</h2>
        <p style="color:red;"><?= $error ?></p>
        <input type="text" name="username" placeholder="Username" required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
