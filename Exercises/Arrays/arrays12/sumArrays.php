<?php
function sumArrays(array $arrays)
{
    $sum = [];
    foreach ($arrays as $array) {
        $i = 0;
        foreach ($array as $item) {
            $sum[$i] += $item;
            $i++;
        }
    }

    return $sum;
}