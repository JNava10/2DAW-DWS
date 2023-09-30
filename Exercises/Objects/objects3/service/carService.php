<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/builder/carFactory.php';

function getCars($quantity) {
    return new \factory\CarFactory();
}