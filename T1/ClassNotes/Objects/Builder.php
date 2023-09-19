<?php

class Builder
{
    private static $names = [
        'Jaime',
        'Laura',
        'Manuel',
        'Fernando',
        'Elena'
    ];

    private static function generateCharacter()
    {
        $character = new Character($names)
    }

    function characterGenerator($count = 10)
    {
        $characters = [];
        for ($i = 0; i < $count; $i++) {
            $characters[] = self::generateCharacter();
        }
    }
}