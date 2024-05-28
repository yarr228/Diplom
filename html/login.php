<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // После успешной аутентификации
    $_SESSION['login'] = $login; // 

    header('Location: music_page.php');   // Если пользователь найден, перенаправляем на страницу музыки
    exit(); // Выход из скрипта, чтобы предотвратить дальнейшее выполнение кода
} else {
    // Если пользователь не найден, перенаправляем на главную страницу с сообщением об ошибке
    header('Location: main_page.php?error=incorrect_credentials');
    exit(); // Выход из скрипта, чтобы предотвратить дальнейшее выполнение кода
}
?>
