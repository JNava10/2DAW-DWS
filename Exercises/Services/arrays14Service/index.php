<?php
/** @noinspection DuplicatedCode */
require_once 'flyGame.php';

function checkValidArgsNumber(array $requestArgs)
{
    $validArgsNumber = 1;

    if (empty($requestArgs[1])) $requestMessage = 'No args sended';
    else if (count($requestArgs) > $validArgsNumber) $requestMessage = 'Too many args sended';
    else $requestMessage = 'OK';

    if (count($requestArgs) != $validArgsNumber || empty($requestArgs[1])) $requestCode = 404;
    else $requestCode = 200;

    return [
        'code' => $requestCode,
        'message' => $requestMessage
    ];
}

function processResponseData(array $requestArgs)
{


    print_r($requestArgs);
    echo $requestArgs;

    return [
        'capicua' => $isCapicua
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $requestArgs = explode('/', $_SERVER['REQUEST_URI']);
    unset($requestArgs[0]);

    $headerData = checkValidArgsNumber($requestArgs);
    $headerCode =  $headerData['code'];
    $headerMessage = $headerData['message'];
    header("HTTP/1.1 $headerCode $headerMessage");

    if ($headerCode == 200) {
        $responseData = processResponseData($requestArgs);
        echo json_encode($responseData);
    }
