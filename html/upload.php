<?php

require_once('db.php');
// �஢�ઠ ᮥ�������
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// �஢�ઠ, �뫠 �� �ଠ ��ࠢ����
// �஢�ઠ ᮥ�������
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// �믮������ ����� � ���� ������
$sql = "SELECT * FROM music_tracks";
$result = $conn->query($sql);

// �뢮� ������ �� ��࠭���
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