<?php
function checkIfIsPrime($number) {
    $isPrime = true;
    if ($number % sqrt($number) == 0 && $number > 3) {
        $isPrime = false;
    }

    return $isPrime;
}