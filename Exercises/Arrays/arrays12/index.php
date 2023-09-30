<?php
require_once 'sumArrays.php';

$arr1 = [1, 2, 3];
$arr2 = [1, 2, 3];

$sum = sumArrays([$arr1, $arr2]);

print_r($sum);