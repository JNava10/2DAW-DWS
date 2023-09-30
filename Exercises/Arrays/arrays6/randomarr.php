<?php
function create_random_arr($length, $min_num, $max_num) {
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $random_num = rand($min_num, $max_num);
        $arr[] = $random_num;
    }

    return $arr;
}