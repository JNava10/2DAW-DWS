<?php

namespace Model;

class Villager {
    public $health;
    public $civilizationName;

    public function __construct(string $civilizationName, int $health) {
        $this->civilizationName = $civilizationName;
        $this->health = $health;
    }

    public function getHealth(): int {
        return $this->health;
    }

    public function setHealth($health) {
        $this->health = $health;
    }

    public function getCivilizationName(): string {
        return $this->civilizationName;
    }

    public function setCivilizationName($civilizationName) {
        $this->civilizationName = $civilizationName;
    }
}