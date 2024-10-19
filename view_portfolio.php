<?php
include 'scripts/db.php';

$portfolio_id = $_GET['id'];
$sql = "SELECT * FROM portfolios WHERE id='$portfolio_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $portfolio = $result->fetch_assoc();
} else {
    echo "Portfolio not found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $portfolio['title']; ?></title>
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
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php else: ?>
                    
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<div class="portfolio">
    <h1><?php echo $portfolio['title']; ?></h1>
    <img src="assets/images/<?php echo $portfolio['image']; ?>" alt="<?php echo $portfolio['title']; ?>">
    <p><?php echo $portfolio['description']; ?></p>
    <a href="<?php echo $portfolio['link']; ?>" target="_blank">View Project</a>
</div>

</body>
</html>