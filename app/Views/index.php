<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Tracks</title>
    <!-- Add your CSS and JavaScript dependencies if needed -->
</head>
<body>
    <h1>Music Tracks</h1>

    <?php if (!empty($tracks)): ?>
        <ul>
            <?php foreach ($tracks as $track): ?>
                <li><?= $track['Title'] ?> by <?= $track['Artist'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No tracks found.</p>
    <?php endif; ?>

    <!-- Add your additional HTML content here if needed -->
</body>
</html>