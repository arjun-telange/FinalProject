<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // default XAMPP password is empty
$db   = 'movie_booking';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}
?>
