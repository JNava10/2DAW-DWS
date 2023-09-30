<?php
require_once 'Character.php';

$eren = new Character('Eren J.', 20);
echo "$eren<br>";

$eren->setAge('17');

echo Character::$TITANTYPE;