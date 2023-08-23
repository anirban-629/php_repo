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

$sql = "SELECT * FROM phptrip";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
    echo
    '<table class="table">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">Destination</th>
        </tr>
      </thead>
      <tbody>';
    while (
        $row = mysqli_fetch_assoc($result)
    ) //Associative arrray
    {
        echo
        '<tr>
          <th scope="row">' . $row['sno'] . '</th>
          <td>' . $row['name'] . '</td>
          <td>' . $row['destination'] . '</td>
        </tr>';
    }
    echo '</tbody>
   </table>';
} else {
    echo "<h1>No Records Found</h1>";
}
