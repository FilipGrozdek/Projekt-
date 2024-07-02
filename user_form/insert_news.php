<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare('INSERT INTO news (title, content) VALUES (:title, :content)');
    $stmt->execute(['title' => $title, 'content' => $content]);

    echo "News article added successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News Article</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="pictures/header.jpg">
        <h1>Formula One Racing Blog</h1>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="fetch_news.php">News</a>
        <a href="insert_news.php">Add News</a>
        <a href="drivers.php">Drivers</a>
        <a href="contact.html">Contact</a>
        <a href="register.html">Register</a>
        <a href="login.html">Log In</a>
    </nav>
    <h1>Add News Article</h1>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br><br>
        <button type="submit">Add Article</button>
    </form>
</body>
</html>