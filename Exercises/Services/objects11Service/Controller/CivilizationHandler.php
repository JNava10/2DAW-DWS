<?php

namespace Controller;

use Model\Civilization;

class CivilizationHandler {
    public static $civilizations;

    public static function setCivilizations(Civilization $civilizationA, Civilization $civilizationB) {
        CivilizationHandler::$civilizations = [
            $civilizationA->getName() => $civilizationA,
            $civilizationB->getName() => $civilizationB
        ];
    }
}