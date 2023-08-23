<?php
echo "Cookie";
// Cookie || Session

//  ? Syntax 

// echo time() //Gives the time upto now
setcookie("category", "Books", time() + 86400, "/");
echo "<br>The cookie is set";

$cat = $_COOKIE['category'];
echo '<br>' . $cat;
