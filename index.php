<?php
// Start the session
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
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <div class="container">
        <h1>Create and Showcase Your Portfolios</h1>
        <p>Welcome to the Personal Portfolio Maker! This application allows you to register, create, and manage your own portfolios. Showcase your projects and share your work with the world.</p>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="register.php" class="button">Get Started</a>
        <?php else: ?>
            <a href="dashboard.php" class="button">Go to Dashboard</a>
        <?php endif; ?>
    </div>
</section>

</body>
</html>
<?php include 'templates/footer.php'; ?>