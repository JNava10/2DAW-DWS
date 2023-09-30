<?php
function check_quantity_of_number($arr, $num) {
    $i = 0;
    foreach ($arr as $key) {
        if ($key == $num) $i++;
    }

    return $i;
}