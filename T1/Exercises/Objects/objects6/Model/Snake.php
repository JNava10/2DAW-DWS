<?php

namespace Model;
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Model/Ring.php';


class Snake
{
    public $rings;
    public $age;
    public $isDeath;
    public $size;

    public function getOld() {
        $this->age++;
    }

    public function __construct() {
        $this->age = 0;
        $this->isDeath = false;
        $this->rings[] = new Ring();
        $this->size = count($this->rings);
    }

    public function kill(): bool
    {
        $this->isDeath = true;
        return true;
    }

    public function shedSkin(): bool
    {
        foreach ($this->rings as $ring) {
            $ring = new Ring();
        }

        return true;
    }

    public function decrease($size): bool
    {
        for ($i = 0; $i < $size; $i++) {
            array_pop($this->rings);
        }

        return true;
    }

    public function increase($size): bool
    {
        for ($i = 0; $i < $size; $i++) {
            $this->rings[] = new Ring();
        }

        $this->size++;

        return true;
    }

    public function getRings(): array
    {
        return $this->rings;
    }

    public function setRings($rings) {
        $this->rings = $rings;
    }

    public function getAge() {
        return $this->age;
    }

    public function getIfDeath(): bool
    {
        return $this->isDeath;
    }
}