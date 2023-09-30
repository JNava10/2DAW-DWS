<?php

namespace Model;

class Mine {
    public $type;
    public $resources;
    public $miners;

    public function addMiner(Villager $miner) {
        $this->miners[] = $miner;
    }


    public function extractItem($quantity = 1) {
        $this->resources -= $quantity;

        return [
            $this->type => $quantity
        ];
    }

    /**
     * @param $type
     * @param $resources
     */
    public function __construct(string $type = "gold", int $resources = 500) {
        $this->type = $type;
        $this->resources = $resources;
        $this->miners = [];
    }


    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getResources() {
        return $this->resources;
    }

    public function setResources($resources) {
        $this->resources = $resources;
    }

    public function getMiners(): array {
        return $this->miners;
    }

    public function setMiners(array $miners) {
        $this->miners = $miners;
    }

    public function getMinerCount() {
        return count($this->miners);
    }
}