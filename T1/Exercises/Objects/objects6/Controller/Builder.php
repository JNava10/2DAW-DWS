<?php

namespace Controller;

use Model\Snake;

class Builder
{
    static function createSnakes(int $quantity): array
    {
        $snakes = [];
        for ($i = 0; $i < $quantity; $i++) {
            $snakes[] = new Snake();
        }

        return $snakes;
    }
}