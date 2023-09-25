<?php
// Primero va la cabecera
header("Content-Type:application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];

function handleArgs($args)
{
    foreach ($args as $arg) {

    }
}

if ($requestMethod == 'GET') {
    $args = explode('/', $_SERVER['REQUEST_URI']);

    checkIfValidArgs($args);

    $array = [1, 2, 3, 4];

// Despues se responde la peticion con un codigo
    $code = 200;
    header("HTTP/1.1 $code");

// Por ultimo, se envia una respuesta
    echo json_encode($array);
} else {
    $code = 405;
    header("HTTP/1.1 $code");
}

