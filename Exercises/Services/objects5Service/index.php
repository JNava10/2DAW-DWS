<?php
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Model/Set.php';

use Controller\ArrayBuilder;
use Model\Set;

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

function getSetData(array $requestArgs): array {
    $firstLetters = ArrayBuilder::generateLetters(10, 'i');
    $secondLetters = ArrayBuilder::generateLetters(10, 'z');
    $firstSet = new Set(10, $firstLetters);
    $secondSet = new Set(10, $secondLetters);
    $action = strtolower($requestArgs[1]);

    $setData = [
        'firstSet' => $firstSet,
        'secondSet' => $secondSet
    ];

    if ($action == 'u') {
        $setData['union'] = $firstSet->join($secondSet);
    } elseif ($action == 'i') {
        $setData['intersection'] = $firstSet->intersect($secondSet);
    }

    return $setData;
}

function checkIfBadRequest($requestArgs, $validArgsNumber): string {
    $validArgCharacters = ['i', 'u'];

    if (empty($requestArgs[1])) {
        $reason = 'No arguments';
    } elseif (count($requestArgs) > $validArgsNumber) {
        $reason = 'Too much arguments';
    } elseif (count($requestArgs) < $validArgsNumber) {
        $reason = 'Too less arguments';
    } elseif (strval($requestArgs[1]) == 0) {
        $reason = 'Argument type not valid';
    } elseif (!in_array($requestArgs[1], $validArgCharacters)) {
        $reason = 'Argument content is not valid.';
    } elseif ($requestArgs[1] == 0) {
        $reason = 'Argument must be greater than zero';
    } else {
        $reason = '';
    }

    return $reason;
}