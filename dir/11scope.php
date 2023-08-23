<?php

$a = 10;
$b = 20;
function printVal()
{
    // $a = 97; //Local variable
    global $a, $b; //Taking acesse to the global variable
    $a = 100;
    $b = 200;
    echo $a . "-" . $b;
}

echo $a . "-" . $b;
echo "<br>";
printVal();
echo "<br>";
echo $a . "-" . $b;
echo "<br>";

// echo var_dump($GLOBALS); //Prints all the global variables
echo "<br>";
echo var_dump($GLOBALS["a"]);
echo "<br>";
echo var_dump($GLOBALS["b"]);
