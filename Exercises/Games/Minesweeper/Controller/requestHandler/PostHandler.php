<?php

namespace requestHandler;

use Controller\GameHandler;

class PostHandler {
    public static function handleRequest(array $requestData): array {
        $responseData = [];
        $defaultResponse = 'OK';

        $responseData['status'] = [
            $defaultResponse,
            STATUSLIST[$defaultResponse]
        ];

        if (!$requestData['gameStarted']) {
            self::createGame();
        }

        return $responseData;
    }

    private static function createGame(array $requestData) {
        GameHandler::createGame($requestData);
    }
}