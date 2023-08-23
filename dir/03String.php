<?php
$name = "Anirban Mishra";
echo "$name<br>";
echo "Length of my string is - " . strlen($name) . "<br>";
echo str_word_count($name);
echo "<br>";
echo strrev($name);
echo "<br>";
echo strpos($name, "ban"); // Position of a string
echo "<br>";
echo str_replace("Anirban", "Rahul", $name);
echo "<br>";
echo str_repeat($name, 10);
echo "<br>";
echo "<pre>";
echo "                     Anirban             ";
echo "<br>";
echo ltrim("      Anirban       ");
echo "<br>";
echo rtrim("      Anirban       ");
echo "</pre>";
