<?PHP
echo "Welcome to the Phase of connection to the DB<br>";

$servername = "localhost";
$username = "root";
$password = "";

global $conn;
try {
    $conn = mysqli_connect($servername, $username, $password);
    echo "Successfully connected to the Database<br>";
} catch (\Throwable $th) {
    die("Sorry! Failed to connect the databse - <b>" . mysqli_connect_error() . "</b><br>");
}

$sql = "CREATE DATABASE test;";

$result = mysqli_query($conn, $sql);
if ($result) echo "Database created successfully<br>";
else echo "Database Creation Failed" . mysqli_error($conn);
