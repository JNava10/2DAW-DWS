<?php

namespace Controller;

use Database;
use Factory;
use Model\Game;

class GameHandler {
    static function getGameData($userName): Game {
        return Database::selectUserLastGame($userName);
    }

    static function createGame(array $requestData) {
        $game = Factory::createGame();

        return Database::insertGame($game);
    }
}