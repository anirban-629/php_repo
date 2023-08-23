<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "forum";

global $conn;
try {
    $conn = mysqli_connect($servername, $username, $password, $database);
} catch (\Throwable $th) {
    die("Sorry! Failed to connect the databse - <b>" . mysqli_connect_error() . "</b><br>");
}
