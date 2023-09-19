<?php
function generateLotteryNumbers($quantity, $max) {
    $lotteryPool = [];

    for ($i = 0; $i < $quantity; $i++) {
        $number = rand(1, $max);
        if (!in_array($number, $lotteryPool)) {
            $lotteryPool[] = $number;
        }
    }

    return $lotteryPool;
}