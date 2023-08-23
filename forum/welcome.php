<?php
include "partials/_header.php";
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; ?>
<?php } else include "partials/_navbar.php"; ?>
<h1>Welcome <?php echo $_SESSION['username'] ?></h1>
<?php
include "partials/_footer.php";
?>