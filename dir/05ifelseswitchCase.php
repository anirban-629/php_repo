<?php
$a = 100;
$b = 200;
if ($a >= 100) echo "A>=100<br>";
if ($b == 200) echo "B>=200<br>";
else echo "A<100<br>";

echo $b > 100 ? "B>=100" : "B<100";

echo "<br>";
echo "<br>";
echo "Switch Case Statements<br>";

$age = 20;
switch ($age) {
    case 10:
        echo "Case 10";
        break;
    case 20:
        echo "Case 20";
        break;
    default:
        echo "Case default";
        break;
}
