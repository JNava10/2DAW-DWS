<?php
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Model/Snake.php';
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Model/Nest.php';
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Controller/Builder.php';

use inheritance8Service\Controller\AnimalBuilder;
use Model\Nest;
use Model\Snake;

function simSnakeLife($years): Snake {
    $snake = new Snake();

    for ($i = 0; $i < $years; $i++) {
        simYear($snake);
    }

    return $snake;
}

function simSnakesLife(int $years, int $snakeQuantity): Nest {
    $nest = new Nest(AnimalBuilder::createSnakes($snakeQuantity));
    $snakes = $nest->getSnakes();
    $snakeIsDead = false;

    for ($i = 0; $i < $years; $i++) {
        for ($j = 0; $j < count($snakes) && !$snakeIsDead; $j++) {
            $snakeIsDead = simYear($snakes[$j]);
            if ($snakeIsDead) continue;
        }
    }

    return $nest;
}

function simYear(Snake $snake): bool {
    $age = $snake->getAge();
    $getAttacked = rand(1, 100) <= 10;


    if ($getAttacked) {
        $snake->kill();
    } else {
        if ($age < 10) {
            actionsOfYoungSnake($snake);
        } elseif ($age > 10) {
            actionsOfOldSnake($snake);
        }

        $snake->getOld();
    }

    return $snake->getIfDeath();
}

function actionsOfYoungSnake(Snake $snake): Snake {
    // FIXME: Variable names can be better.
    $randomProbability = rand(1, 100);
    $randomProbability2 = rand(1, 100);

    if ($randomProbability <= 80) {
        $snake->increase(1);
    }

    if ($randomProbability2 <= 20) {
        $snake->shedSkin();
    }

    return $snake;
}

function actionsOfOldSnake(Snake $snake): Snake {
    // FIXME: Same of the last method.
    $randomProbability = rand(1, 100);
    $randomProbability2 = rand(1, 100);

    if ($randomProbability <= 90) {
        $snake->decrease(1);
    }

    if ($randomProbability2 <= 10) {
        $snake->shedSkin();
    }

    return $snake;
}

// TODO: The next methods wasn't working because 'Uncaught Error: Value of type bool is not callable'.
//function simYear(Snake $snake)
//{
//    if ($snake->getAge() < 10) {
//        execMethodAtRandom(80, $snake->increase(1));
//        execMethodAtRandom(20, $snake->shedSkin());
//    } else if ($snake->getAge() > 10) {
//        execMethodAtRandom(90, $snake->decrease(1));
//        execMethodAtRandom(10, $snake->shedSkin());
//    }
//
//    return execMethodAtRandom(10, $snake->kill());
//}

//function execMethodAtRandom(int $maxPercentage, $function) {
//    $probability = rand(1, 100);
//    $executed = false;
//    if ($probability < $maxPercentage) {
//        $executed = $function();
//    }
//
//    return $executed;
//}