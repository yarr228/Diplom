<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ��᫥ �ᯥ譮� ��⥭�䨪�樨
    $_SESSION['login'] = $login; // 

    header('Location: music_page.php');   // �᫨ ���짮��⥫� ������, ��७��ࠢ�塞 �� ��࠭��� ��모
    exit(); // ��室 �� �ਯ�, �⮡� �।������ ���쭥�襥 �믮������ ����
} else {
    // �᫨ ���짮��⥫� �� ������, ��७��ࠢ�塞 �� ������� ��࠭��� � ᮮ�饭��� �� �訡��
    header('Location: main_page.php?error=incorrect_credentials');
    exit(); // ��室 �� �ਯ�, �⮡� �।������ ���쭥�襥 �믮������ ����
}
?>
