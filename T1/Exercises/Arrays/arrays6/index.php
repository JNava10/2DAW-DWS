<?php
include_once 'check_quantity_num.php';
include_once 'randomarr.php';

$quantity = 0;
$num = 1;

$arr = create_random_arr(5, 1, 3);
$quantity = check_quantity_of_number($arr, $num);

echo "Cantidad de numeros '$num' en el array: $quantity";