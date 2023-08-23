<?php
$arr = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9),
);

foreach ($arr as $key) {
    foreach ($key as $value)
        echo "$value ";
    echo "<br>";
}
