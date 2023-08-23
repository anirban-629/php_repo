<?php

session_start();
if (isset($_SESSION['username'])) {
    echo "welcome " . $_SESSION['username'] . " and your favorite catergory is " . $_SESSION['favcat'];
    echo '<br><a href="/php/dir/27destroySession.php">Logout</a>';
} else {
    echo "<br> You've been logged out";
    echo '<br><a href="/php/dir/25Session.php">Login here</a>';
}
