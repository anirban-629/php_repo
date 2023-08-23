<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

global $conn;
try {
    $conn = mysqli_connect($servername, $username, $password, $database);
    echo "<div>Connection succesfull</div>";
} catch (\Throwable $th) {
    die("Sorry! Failed to connect the databse - <b>" . mysqli_connect_error() . "</b><br>");
}

$sql = "DELETE FROM `phptrip` WHERE `Name` = 'ABS'";
try {
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<div>Record Deleted Successfully  </div>";
} catch (\Throwable $th) {
    echo "<div>Error - " . $th . "</div>";
}
