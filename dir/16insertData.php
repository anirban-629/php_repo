<?PHP
echo "Welcome to the Phase of connection to the DB<br>";

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

global $conn;
try {
    $conn = mysqli_connect($servername, $username, $password, $database);
    echo "Successfully connected to the Database<br>";
} catch (\Throwable $th) {
    die("Sorry! Failed to connect the databse - <b>" . mysqli_connect_error() . "</b><br>");
}

$name = "ANIKET";
$destination = "BIHARCH";

// $sql = "INSERT INTO `phptrip` (`sno`, `name`, `destination`) VALUES (1, 'Rahul', 'Banglore');"; // Error
// $sql = "INSERT INTO `phptrip` (`name`, `destination`) VALUES ('A', 'B');";
$sql = "INSERT INTO `phptrip` (`name`, `destination`) VALUES ('$name', '$destination');";


$result = mysqli_query($conn, $sql);
if ($result) echo "Data inserterd Succesfully<br>";
