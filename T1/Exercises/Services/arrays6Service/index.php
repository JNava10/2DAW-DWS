<?php
require_once 'randomarr.php';
require_once 'check_quantity_num.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Content-Type:application/json");
    $requestArgs = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($requestArgs);

    $headerCode = getResponseStatus($requestArgs)['code'];
    $headerMessage = getResponseStatus($requestArgs)['message'];
    header("HTTP/1.1 $headerCode $headerMessage");

    $data = processRequestData($requestArgs);
    echo json_encode($data);
} else {
    header('HTTP/1.1 404 Invalid request method');
}

function processRequestData(array $requestArgs): array
{
    $arrayLength = $requestArgs[0];
    $minNumber = $requestArgs[1];
    $maxNumber = $requestArgs[2];
    $numberToCheck = $requestArgs[3];

    $numberArray = create_random_arr($arrayLength, $minNumber, $maxNumber);
    $quantity = check_quantity_of_number($numberArray, $numberToCheck);

    return [
        'array' => $numberArray,
        'quantity' => $quantity
    ];
}

/**
 * @param array $requestArgs
 * @return array Header code and message, respectively.
 */
function getHeaderData(array $requestArgs): array
{
    $validArgsNumber = 4;

    if (count($requestArgs) == $validArgsNumber) {
        $code = 200;
    } else {
        $code = 404;
    }

    if (count($requestArgs) < $validArgsNumber) $msg = 'Too less arguments';
    else if (count($requestArgs) > $validArgsNumber) $msg = 'Too many arguments';
    else $msg = 'OK';

    return [
        'code' => $code,
        'message' => $msg
    ];
}
