<?php
session_start();
require_once('db.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = isset($_SESSION['login']) ? $_SESSION['login'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $albumName = isset($_POST['album_name']) ? $_POST['album_name'] : null;
    $artistName = isset($_POST['artist_name']) ? $_POST['artist_name'] : null;
    $albumPhoto = isset($_POST['album_photo']) ? base64_decode($_POST['album_photo']) : null;
    
    if(isset($_POST['review']) && !empty($_POST['review'])) {
        $review = $_POST['review'];

        $sql = "INSERT INTO reviews (username, album_name, artist_name, album_photo, review_text) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $albumName, $artistName, $albumPhoto, $review);
        if ($stmt->execute()) {
            header("Location: music_page.php");
            exit();
        } else {
            echo "Ошибка при выполнении запроса: " . $stmt->error;
        }
    } else {
        echo "Пожалуйста, введите рецензию.";
    }
}
?>
