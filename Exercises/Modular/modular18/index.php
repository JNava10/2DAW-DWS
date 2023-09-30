<?php

$cash = 3.04;

calcCash($cash);

function calcCash($cash)
{
    $twoEur = 0;
    $oneEur = 0;
    $fiftyPen = 0;
    $twentyPen = 0;
    $tenPen = 0;
    $fivePen = 0;
    $twoPen = 0;
    $onePen = 0;

    $remaind = $cash;

    $remaind = getRest($remaind, 2);
    $twoEur = getCoinQuantity($remaind, 2);

    $remaind = getRest($remaind, 1);
    $oneEur = getCoinQuantity($remaind, 1);

    $remaind = getRest($remaind, 0.5);
    $fiftyPen = getCoinQuantity($remaind, 0.5);

    $remaind = getRest($remaind, 0.2);
    $twentyPen = getCoinQuantity($remaind, 0.2);

    $remaind = getRest($remaind, 0.1);
    $tenPen = getCoinQuantity($remaind, 0.1);

    $remaind = getRest($remaind, 0.05);
    $fivePen = getCoinQuantity($remaind, 0.05);

    $remaind = getRest($remaind, 0.02);
    $twoPen = getCoinQuantity($remaind, 0.02);

    $remaind = getRest($remaind, 0.01);
    $onePen = getCoinQuantity($remaind, 0.01);

    echo '2€: ' . $twoEur;
    echo '1€: ' . $oneEur;
    echo '50 cent: ' . $fiftyPen;
    echo '20 cent: ' . $twentyPen;
    echo '10 cent: ' . $tenPen;
    echo '5 cent: ' . $fivePen;
    echo '2 cent: ' . $twoPen;
    echo '1 cent: ' . $onePen;
}

function getCoinQuantity($remaind, $value)
{

    $division = $remaind / ($value * 10);
    return $division * 10;
}

function getRest($remaind, $value)
{
    return $remaind % $value;
}