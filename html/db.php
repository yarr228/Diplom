<?php

$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'Musicly';

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed". mysqli_connect_error());
}
else {
}