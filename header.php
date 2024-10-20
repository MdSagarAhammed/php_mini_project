<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Maker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="container">
        <div id="branding">
            <h1>Personal Portfolio Maker</h1>
        </div>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/dashboard.php">Dashboard</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/register.php">Register</a></li>
                    <li><a href="/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>