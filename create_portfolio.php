<?php
include 'scripts/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    $sql = "INSERT INTO portfolios (user_id, title, description, image, link) VALUES ('$user_id', '$title', '$description', '$image', '$link')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Create Portfolio</h1>
<form action="create_portfolio.php" method="post">
    <label for="title">Portfolio Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <label for="image">Image:</label>
    <input type="file" accept="image/*" id="image" name="image" required>
    <label for="link">Portfolio Link:</label>
    <input type="text" id="link" name="link" required>
    <button type="submit">Create Portfolio</button>
</form>

</body>
</html>