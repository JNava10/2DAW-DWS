<?php
function fillArrayWithNumbers(&$array, $size, $initialNumber) {
    for ($i = 0; $i < $size; $i++) {
        $array[$i] = $initialNumber;
        $initialNumber++;
    }
}