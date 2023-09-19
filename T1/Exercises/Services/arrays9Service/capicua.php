<?php
function checkIfCapicua($number)
{
    $is_capicua = false;
    $number_arr = str_split($number);
    if ($number_arr == array_reverse($number_arr)) $is_capicua = true;

    return $is_capicua;
}
