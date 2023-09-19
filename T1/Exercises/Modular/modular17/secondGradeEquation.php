<?php
function secondGradeEquation($a, $b, $c, &$resultPlus, &$resultMinus) {
    $resultPlus = round((-$b + sqrt(pow($b, 2) - 4 * $a * $c) / 2 * $a));
    $resultMinus = (-$b - sqrt(pow($b, 2) - 4 * $a * $c) / 2 * $a);
}