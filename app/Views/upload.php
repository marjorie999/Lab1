<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Music</title>
    <!-- Add your CSS and JavaScript dependencies if needed -->
</head>
<body>
    <h1>Upload Music</h1>
    <form action="/upload" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div><br>
        <div>
            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" required>
        </div><br>
        <div>
            <label for="music_file">Select Music File:</label>
            <input type="file" id="music_file" name="music_file" accept=".mp3, .mp4, .M4A" required>
        </div><br>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
    <!-- Display any validation errors here if needed -->
</body>
</html>
