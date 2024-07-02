<?php
include 'db_config.php';

function fetchAllNews($pdo) {
    $stmt = $pdo->query('SELECT * FROM news ORDER BY publish_date DESC');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$newsArticles = fetchAllNews($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
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
    <div class="container">
        <h1>Latest News</h1>
        <?php if (!empty($newsArticles)): ?>
            <?php foreach ($newsArticles as $news): ?>
                <div class="news-article">
                    <h2><?= htmlspecialchars($news['title']) ?></h2>
                    <p><?= htmlspecialchars($news['content']) ?></p>
                    <small>Published on: <?= htmlspecialchars($news['publish_date']) ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news articles found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
