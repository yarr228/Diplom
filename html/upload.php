<?php

require_once('db.php');
// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, была ли форма отправлена
// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение запроса к базе данных
$sql = "SELECT * FROM music_tracks";
$result = $conn->query($sql);

// Вывод данных на страницу
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Artist: " . $row["artist_name"]. " - Track: " . $row["track_name"]. "<br>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/><br>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>