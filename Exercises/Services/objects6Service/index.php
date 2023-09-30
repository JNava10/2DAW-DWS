<?php
require_once 'Controller/simulation.php';

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

$responseData = $statusData;

if ($statusCode == 200) {
    $responseData['data'] = getAnimalData($requestArgs);
}

echo json_encode($responseData);

function getSimulationObjects(array $requestArgs): array {
    $simulationObjects = [];

    if (count($requestArgs) == 1) {
        $simulationObjects['snake'] = simSnakeLife($requestArgs[1]);
    } else {
        $simulationObjects[] = simSnakesLife($requestArgs[1], $requestArgs[2]);
    }

    return $simulationObjects;
}

function getResponseStatus(array $requestArgs, string $requestMethod): array {
    $maxArgs = 1;
    $validRequestMethods = ['GET'];
    $standardResponses = [
        200 => 'OK',
        400 => 'Bad request',
        405 => 'Method not allowed'
    ];

    if (count($requestArgs) > $maxArgs || intval($requestArgs[1]) == 0 || $requestArgs[1] == 0) $code = 400;
    elseif (!in_array($requestMethod, $validRequestMethods)) $code = 405;
    else $code = 200;

    $reason = checkIfBadRequest($requestArgs, $maxArgs);

    $statusData = [
        'code' => $code,
        'message' => $standardResponses[$code]
    ];

    if ($code == 400) $statusData['reason'] = $reason;
    return $statusData;
}

function getErrorReason($requestArgs, $validArgsNumber): string {
    if (empty($requestArgs[1])) $reason = 'No arguments';
    else if (count($requestArgs) > $validArgsNumber) $reason = 'Too much arguments';
    else if (count($requestArgs) < $validArgsNumber) $reason = 'Too less arguments';
    else if (intval($requestArgs[1]) == 0) $reason = 'Argument type not valid';
    else if ($requestArgs[1] == 0) $reason = 'Argument must be greater than zero';
    else $reason = 'Unknown';
    return $reason;
}