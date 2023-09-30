<?php

namespace Controller;

use Model\Civilization;
use Model\Mine;
use Model\Villager;

class Simulation {
    static function makeSim(
        Civilization $civilizationA,
        Civilization $civilizationB,
        Mine $mine,
        int $time
    ): array
    {
        for ($i = 0; $i < $time; $i++) {
            self::runEverySecond($mine);
            if ($i % 2 == 0) {
                self::addRandomToMine($civilizationA, $civilizationB, $mine);
            } else if ($i % 5 == 0) {
                self::invokePriest($civilizationA, $civilizationB);
            }
        }

        return [
            $civilizationA->getName() => $civilizationA,
            $civilizationB->getName() => $civilizationB,
            'mine' => $mine,
            'secondsExecuted' => $time
        ];
    }

    private static function runEverySecond(Mine $mine) {
        $itemsExtracted = $mine->extractItem();
        self::placeItemInMinersInventory($mine, $itemsExtracted);
    }


    private static function addRandomToMine(Civilization $civilizationA, Civilization $civilizationB, Mine $mine) {
        $randomNumber = rand(1, 100);

        if ($randomNumber <= 40) {
            $mine->addMiner(new Villager($civilizationA->getName(), $civilizationA->getDefaultHealth()));
        } else if ($randomNumber <= 60) {
            $mine->addMiner(new Villager($civilizationB->getName(), $civilizationB->getDefaultHealth()));
        }
    }

    private static function placeItemInMinersInventory(Mine $mine, array $itemsExtracted) {
        $miners = $mine->getMiners();
        $civilizations = [];

        foreach ($miners as $miner) {
            if ($miner instanceof Villager) {
                $civilization = $miner->getCivilizationName();

                if (!$civilization->alreadyMined) {
                    $civilization->addToInventory($itemsExtracted);
                    $civilization->setAlreadyMined(true);
                    $civilizations[] = $civilization;
                }
            }
        }

        foreach ($civilizations as $civilization) {
            if ($civilization instanceof Civilization) {
                $civilization->setAlreadyMined(false);
            }
        }
    }

    private static function invokePriest(Civilization $civilizationA, Civilization $civilizationB) {
        $convertedVillagerData = $civilizationA->getRandomVillager();
        $convertedVillagerKey = array_key_first($convertedVillagerData);
        $convertedVillager = $convertedVillagerData[$convertedVillagerKey];

        unset($civilizationA->getVillagers()[array_key_first($convertedVillagerData)]);

        $civilizationB->addVillager($convertedVillager);
    }
}