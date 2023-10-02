<?php

use Model\Game;

class Factory {
    static function createGame($tableLength, $mineQuantity): Game {
        $table = array_fill(0, $tableLength - 1, null);
        $progress = Factory::putMines($mineQuantity, $table);
    }

    private static function putMines(int $mineQuantity, array $table) {
        for ($i = 0; $i < $mineQuantity; $i++) {
            $minePosition = rand(0, count($table));

            if ($table[$minePosition] != 0) {
                $table[$minePosition] = 0;
            }
        }
    }
}