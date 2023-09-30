<?php
require_once 'secondGradeEquation.php';

$resultPlus = 0;
$resultMinus = 0;
$a = 2;
$b = 2;
$c = 2;

secondGradeEquation($a, $b, $c, $resultPlus, $resultMinus);

echo $resultPlus . '<br>';
echo $resultMinus . '<br>';
