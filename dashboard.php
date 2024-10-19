<?php
include 'scripts/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM portfolios WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<h1>Dashboard</h1>
<a href="create_portfolio.php">Create New Portfolio</a>
<div class="portfolios">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='portfolio'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<a href='view_portfolio.php?id=" . $row['id'] . "'>View Portfolio</a>";
            echo "</div>";
        }
    } else {
        echo "No portfolios found.";
    }
    ?>
</div>
<!-- <div>
<a href="logout.php">Logout</a>
</div> -->


</body>
</html>
<?php include 'templates/footer.php'; ?>