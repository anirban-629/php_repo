<?php
function totalMarks($marks)
{
    $sum = 0;
    foreach ($marks as $value)  $sum += $value;
    return $sum;
}

$Anirban = [1, 2, 3, 4, 5];
$Sucho = [6, 7, 8, 9, 10];


echo totalMarks($Anirban) . "-" . totalMarks(($Sucho));
