<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$recievedData = file_get_contents('php://input');
$decodedData = json_decode($recievedData, true);

print_r($decodedData);
