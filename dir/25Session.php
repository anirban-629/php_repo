<?php
session_start();
echo "Session<br>";

// What is session?
// - used to manage information accross difference pages

// Verify the login user information
$_SESSION['username'] = "Anirban";
$_SESSION['favcat'] = "Books";

echo "We've saved your session";
echo '<br><a href="/php/dir/26_Session_getData.php">Get Data</a>';
echo '<br><a href="/php/dir/27destroySession.php">Logout</a>';
