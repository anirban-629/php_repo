<?php
session_start();
session_unset();
session_destroy();
echo "Logged Out Successfully.!!";
echo '<br><a href="/php/dir/25Session.php">Login here</a>';
