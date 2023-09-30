<?php

require_once dirname(__DIR__ . '/Model/Animal.php');
require_once dirname(__DIR__ . '/Controller/AnimalBuilder.php');

use inheritance8Service\Controller\AnimalBuilder;

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestArgs = explode( '/', $_SERVER['REQUEST_URI']);
unset($requestArgs[0]);

header("Content-Type:application/json");

$statusData = getResponseStatus($requestArgs, $requestMethod);
$statusCode = $statusData['code'];
$statusMsg = $statusData['message'];

if ($statusCode == 400) {
    $statusReason = $statusData['reason'];
    header("HTTP/1.1 $statusCode $statusMsg ($statusReason)");
} else {
    header("HTTP/1.1 $statusCode $statusMsg");
}

$response = $statusData;

if ($statusCode == 200) {
    $response['data'] = getAnimalData($requestArgs);
}

echo json_encode($response);

function getResponseStatus(array $requestArgs, string $requestMethod): array {
    $maxArgs = 1;
    $validRequestMethods = ['GET'];
    $standardResponses = [
        200 => 'OK',
        400 => 'Bad request',
        405 => 'Method not allowed'
    ];

    $reason = checkIfBadRequest($requestArgs, $maxArgs);

    if (!in_array($requestMethod, $validRequestMethods)) {
        $code = 405;
    } else if (!empty($reason)) {
        $code = 400;
    } else {
        $code = 200;
    }

    $statusData = [
        'code' => $code,
        'message' => $standardResponses[$code]
    ];

    if ($code == 400) {
        $statusData['reason'] = $reason;
    }

    return $statusData;
}

function getAnimalData(array $requestArgs): array {
    $animals = [];
    $quantity = $requestArgs[1];

    for ($i = 0; $i < $requestArgs[1]; $i++) {
        if ($quantity > 1) {
            $animals = AnimalBuilder::generateAnimals($quantity);
        } else {
            $animals = AnimalBuilder::generateRandomAnimal();
        }
    }

    return $animals;
}

function checkIfBadRequest($requestArgs, $validArgsNumber): string {

    if (empty($requestArgs[1])) {
        $reason = 'No arguments';
    } elseif (count($requestArgs) > $validArgsNumber) {
        $reason = 'Too much arguments';
    } elseif (count($requestArgs) < $validArgsNumber) {
        $reason = 'Too less arguments';
    } elseif (intval($requestArgs[1]) == 0) {
        $reason = 'Argument type not valid';
    } elseif ($requestArgs[1] == 0) {
        $reason = 'Argument must be greater than zero';
    } else {
        $reason = '';
    }

    return $reason;
}