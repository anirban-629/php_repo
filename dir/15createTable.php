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

$sql = "CREATE TABLE `phpTrip` (`sno` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(15) NOT NULL , `destination` VARCHAR(20) NOT NULL , PRIMARY KEY (`sno`));";

$result = mysqli_query($conn, $sql);
if ($result) echo "Table created Succesfully<br>";
