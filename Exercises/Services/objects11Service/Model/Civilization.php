<?php

namespace Model;

class Civilization {
    public $name;
    public $king;
    public $inventory;
    public $villagers;
    public $alreadyMined;
    public $defaultHealth;

    public function addVillager(Villager $villager) {
        $this->villagers[] = $villager;
    }

    public function deleteVillager(int $key) {
        unset($this->villagers[$key]);
    }

    public function addToInventory($item) {
        if (!isset($this->inventory[array_key_first($item)])) {
            $this->inventory[array_key_first($item)] = $item[array_key_first($item)];
        } else {
            $this->inventory[array_key_first($item)] += $item[array_key_first($item)];
        }
    }

    public function getRandomVillager(): array {
        return [
            array_rand($this->villagers) => $this->villagers[array_rand($this->villagers)]
        ];
    }

    public function __construct(string $name, string $leader, int $defaultHealth) {
        $this->inventory = [];
        $this->villagers = [];
        $this->name = $name;
        $this->king = $leader;
        $this->alreadyMined = false;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getKing(): string {
        return $this->king;
    }

    public function setKing($king) {
        $this->king = $king;
    }

    public function getInventory(): array {
        return $this->inventory;
    }

    public function setInventory($inventory) {
        $this->inventory = $inventory;
    }

    public function getVillagers(): array {
        return $this->villagers;
    }

    public function setVillagers($villagers) {
        $this->villagers = $villagers;
    }

    public function getAlreadyMined(): bool {
        return $this->alreadyMined;
    }

    public function setAlreadyMined(bool $alreadyMined): void {
        $this->alreadyMined = $alreadyMined;
    }

    public function getDefaultHealth()
    {
        return $this->defaultHealth;
    }

    public function setDefaultHealth($defaultHealth): void {
        $this->defaultHealth = $defaultHealth;
    }
}