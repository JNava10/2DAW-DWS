<?php

use Controller\Builder;
use Controller\CivilizationHandler;
use Controller\Simulation;
use Model\Civilization;
use Model\Mine;

require_once 'Controller/Simulation.php';
require_once 'Controller/Builder.php';
require_once 'Model/Civilization.php';
require_once 'Model/Mine.php';
require_once 'Model/Villager.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestArgs = explode('/', $_SERVER['REQUEST_URI']);
unset($requestArgs[0]);

header("Content-Type:application/json");

$validRequestMethods = ['GET', 'POST'];
$statusData = getResponseStatus($requestArgs, $requestMethod, $validRequestMethods);
$statusCode = $statusData['code'];
$statusMsg = $statusData['message'];

if ($statusCode == 400) {
    $statusReason = $statusData['reason'];
    header("HTTP/1.1 $statusCode $statusMsg ($statusReason)");
} else {
    header("HTTP/1.1 $statusCode $statusMsg");
}

$responseData = $statusData;

if ($statusCode == 200 && $requestMethod == 'GET') {
    $defaultParams = [
        'civilizationA' => [
            'name' => 'española',
            'king' => 'alejandro',
            'defaultHealth' => 200
        ],

        'civilizationB' => [
            'name' => 'bizantino',
            'king' => 'constantino',
            'defaultHealth' => 250
        ],

        'mine' => [
            'type' => 'gold',
            'quantity' => 500
        ]
    ];

    $responseData['data'] = getGameObjects($defaultParams, $requestArgs);
} elseif ($statusCode == 200 && $requestMethod == 'POST') {
    $params = json_decode(file_get_contents('php://input'));
}

print_r($responseData);

echo json_encode($responseData);

function getGameObjects(array $simulationParams, $requestArgs): array {
    $gameData = [];
    $villagerQuantity = 10;

    $civilizationA = new Civilization(
        $simulationParams['civilizationA']['name'],
        $simulationParams['civilizationA']['leader'],
        $simulationParams['civilizationA']['defaultHealth']
    );

    $civilizationB = new Civilization(
        $simulationParams['civilizationB']['name'],
        $simulationParams['civilizationB']['leader'],
        $simulationParams['civilizationB']['defaultHealth']
    );

    $mine = new Mine(
        $simulationParams['mine']['type'],
        $simulationParams['mine']['quantity']
    );

    CivilizationHandler::setCivilizations($civilizationA, $civilizationB);

    $villagersA = Builder::createVillagers($villagerQuantity, $civilizationA->getName());
    $villagersB = Builder::createVillagers($villagerQuantity, $civilizationB->getName());

    $civilizationA->setVillagers($villagersA);
    $civilizationB->setVillagers($villagersB);

    $gameData[] = Simulation::makeSim($civilizationA, $civilizationB, $mine, $requestArgs[1]) ;

    return $gameData;
}

function getResponseStatus(array $requestArgs, string $requestMethod, array $validRequestMethods): array {
    $argsNumber = 1;
    $standardResponses = [
        200 => 'OK',
        400 => 'Bad request',
        405 => 'Method not allowed'
    ];

    if (count($requestArgs) !== $argsNumber) $code = 400;
    elseif (!in_array($requestMethod, $validRequestMethods)) $code = 405;
    else $code = 200;

    $reason = getErrorReason($requestArgs, $argsNumber);

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
    else if ($requestArgs[1] == 0) $reason = 'Argument must be greater than zero';
    else $reason = 'Unknown';
    return $reason;
}