<?php

require_once "init.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - User System</title>
</head>
<body>
    <h1>Welcome to the User Management System</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Hello, <?= htmlspecialchars($_SESSION['user']['nome']) ?>! You are logged in as <strong><?= htmlspecialchars($_SESSION['user']['tipo']) ?></strong>.</p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="views/register.php">Register</a> |
        <a href="views/login.php">Login</a>
    <?php endif; ?>
</body>
</html>
