<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestArgs = explode( '/', $_SERVER['REQUEST_URI']);
unset($requestArgs[0]);

header("Content-Type:application/json");

$statusData = getResponseStatus($requestArgs, $requestMethod);
$statusCode = $statusData['code'];
$statusMsg = $statusData['message'];
if ($statusCode == 400)
{
    $statusReason = $statusData['reason'];
    header("HTTP/1.1 $statusCode $statusMsg ($statusReason)");
}
else header("HTTP/1.1 $statusCode $statusMsg");

$carData = $getCars($requestArgs[1]);
function getResponseStatus(array $requestArgs, string $requestMethod): array
{
    $validArgsNumber = 1;
    $validRequestMethods = ['GET']; // Aclaracion: Podrian poder utilizarse mas metodos, por ello se utiliza un array.
    $standardResponses = [
        200 => 'OK',
        400 => 'Bad request',
        405 => 'Method not allowed'
    ];

    if (count($requestArgs) != $validArgsNumber || intval($requestArgs[1]) == 0 || $requestArgs[1] == 0) $code = 400;
    else if (!in_array($requestMethod, $validRequestMethods)) $code = 405;
    else $code = 200;

    $reason = checkIfBadRequest($requestArgs, $validArgsNumber);

    $statusData = [
        'code' => $code,
        'message' => $standardResponses[$code]
    ];

    if ($code == 400) $statusData['reason'] = $reason;
    return $statusData;
}

function getErrorReason($requestArgs, $validArgsNumber): string
{
    if (empty($requestArgs[1])) $reason = 'No arguments';
    else if (count($requestArgs) > $validArgsNumber) $reason = 'Too much arguments';
    else if (count($requestArgs) < $validArgsNumber) $reason = 'Too less arguments';
    else if (intval($requestArgs[1]) == 0) $reason = 'Argument type not valid';
    else if ($requestArgs[0] == 0) $reason = 'Argument must be greater than zero';
    else $reason = 'Unknown';
    return $reason;
}