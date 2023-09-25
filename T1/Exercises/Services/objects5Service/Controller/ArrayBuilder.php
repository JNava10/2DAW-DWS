<?php

namespace Controller;

class ArrayBuilder {
    static function generateLetters(int $quantity, string $maxLetter) {
        $letters = [];

        if (count_chars($maxLetter) > 1) {
            $maxLetter = 'z';
        }

        $letterRange = range('a', $maxLetter);

        for ($i = 0; $i < $quantity; $i++) {
            $letters[] = $letterRange[array_rand($letterRange)];
        }

        return $letters;
    }

    static function generateNumbers(int $quantity, int $maxNumber) {
        $numbers = [];
        $numberRange = range(0, $maxNumber);

        for ($i = 0; $i < $quantity; $i++) {
            $numbers[] = $numberRange[array_rand($numberRange)];
        }

        return $numbers;
    }
}