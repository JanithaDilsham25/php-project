<?php
// Force HTTPS (if not already using HTTPS)
if ($_SERVER['HTTPS'] != "on") {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <form action="./Login/login.php" method="get">
        <button type="submit">Login</button>
    </form>
</body>
</html>
