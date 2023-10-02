<?php

use requestHandler\RequestHandler;

require_once 'Controller/statusInfo.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestArgs = explode('/', $_SERVER['REQUEST_URI']);
$requestData = json_decode(file_get_contents("php://input"));

unset($requestArgs[0]);
header("Content-Type:application/json");

$response = RequestHandler::handleRequest($requestMethod, $requestArgs, $requestData);

echo $response;