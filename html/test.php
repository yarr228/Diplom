<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Photo</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="artist_name">Artist Name:</label>
        <input type="text" name="artist_name" id="artist_name" required>
        <br>
        <label for="track_name">Track Name:</label>
        <input type="text" name="track_name" id="track_name" required>
        <br>
        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo" required>
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>