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

// $sql = "SELECT * FROM `phptrip` WHERE `destination` LIKE 'biharch'";
$sql = "UPDATE `phptrip` SET `name` = 'ABS' WHERE `Name` = 'Aasfioawbndsi'";
$result = mysqli_query($conn, $sql);
// echo mysqli_affected_rows(result);

if ($result) echo "<div>Record Updated Successfully  </div>";
