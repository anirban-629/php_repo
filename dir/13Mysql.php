<?PHP
echo "Welcome to the Phase of connection to the DB<br>";

/* 
Way to connect MySQL DB.
1. MySQLi Extension
2. PDO - PHP DATA OBJECTS 
*/

// Variables to connect the database
$servername = "localhost";
$username = "root";
$password = "asd";

// Create a Connection
try {
    $conn = mysqli_connect($servername, $username, $password);
    echo "Successfully connected to the Database";
} catch (\Throwable $th) {
    die("Sorry! Failed to connect the databse - <b>" . mysqli_connect_error() . "</b>");
}
