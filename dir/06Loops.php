<?php
$i = 0;

while ($i < 5)
    echo $i++ . " ";

echo "<br>";

do {
    echo $i++ . " ";
} while ($i < 10);

echo "<br>";
for ($i; $i < 15; $i++)
    echo $i . " ";

echo "<br>";
$arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h');
foreach ($arr as $value) {
    echo "$value ";
}
