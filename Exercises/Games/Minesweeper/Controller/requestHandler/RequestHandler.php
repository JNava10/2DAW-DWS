<?php

namespace requestHandler;

class RequestHandler {
    static function handleRequest(string $requestMethod, array $requestData) {
        if ($requestMethod == 'GET') {
            $response = GetHandler::handleRequest($requestData);
        } elseif ($requestMethod == 'POST') {
            $response = PostHandler::handleRequest($requestData);
        } elseif ($requestMethod == 'PUT') {
            $response = PutHandler::handleRequest($requestData);
        }
    }
}