<?php

// TODO: Devolver codigo numerico en vez de mensajes.
    function putFlyInBoxes(&$array) {
        $position = rand(0, count($array) - 1);
        $array[$position] = "*";
        return $position;
    }

    function revealFlyPosition($array, $flyPosition) {
        for ($i = 0; $i < count($array); $i++) {
            if ($i == 0) echo '<b>|</b>';
            $gameBox = $i == $flyPosition ? '*' : '&nbsp;';
            if ($i == count($array) - 1) echo $gameBox . '<b>|</b>';
            else echo $gameBox . '|';
        }
        echo '<br><br>';
    }

function createGame(/*$rounds,*/ $boxNumber) {
    $winned = false;
    $gameBoxes = array_fill(0, $boxNumber, '&nbsp;');
    $flyPosition = putFlyInBoxes($gameBoxes);

    for ($i = 0; $winned == false /*|| $i < $rounds*/; $i++) {
        $shotPosition = rand(0, count($gameBoxes) - 1);
        echo 'You shoted to position ' . ($shotPosition + 1) . '.' . '<br>';

        if ($gameBoxes[$shotPosition] == '*') {
            echo 'You win! Rounds needed: ' . ($i + 1) . '<br>';
            $winned = true;
            revealFlyPosition($gameBoxes, $flyPosition);
        }

        // echo $winned == false;

        if ($shotPosition == $flyPosition - 1 || $shotPosition == $flyPosition + 1) {
            $flyPosition = putFlyInBoxes($gameBoxes); // TODO: Deberia poderse evitar la casilla anterior, y colocar la mosca en otra casilla.
            echo 'You shot beside the fly and it moves.<br>';
        }
    }
}