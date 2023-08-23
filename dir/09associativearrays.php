<?php
$arr = ["This", "That", "What"];

echo $arr[0];
echo $arr[1];
echo $arr[2];


echo "<br>";

// Associative array
$arr1 = array(
    "Anirban" => "white",
    "Rahul" => "green",
    "Babai" => "blue",
    8 => "cyan"
);

// echo $arr1["Anirban"];
// echo "<br>";
// echo $arr1["Rahul"];
// echo "<br>";
// echo $arr1["Babai"];
// echo "<br>";
// echo $arr1[8];

foreach ($arr1 as $key => $value)
    echo $key . "-" . $value . "<br>";

$arr2 = array(
    "Anirban" => ["white", "green", "cyan"],
    "Rahul" => "green",
    "Babai" => "blue",
    8 => "cyan"
);

echo "<br>";
foreach ($arr2["Anirban"] as $key => $value)
    echo $key . "-" . $value . "<br>";
