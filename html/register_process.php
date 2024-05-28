<?php
        require_once('db.php');

        $login = $_POST['login'];
        $password = $_POST['pass'];
        $repeatpassword =  $_POST['repeatpass'];

        $sql = "INSERT INTO `users` (login, password) VALUES ('$login', '$password')";
        if ($conn -> query($sql) === TRUE);
        {
            echo '<script>window.location.href = "main_page.php";</script>';
        }
        ?>