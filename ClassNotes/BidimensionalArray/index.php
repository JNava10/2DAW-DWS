<?php
$numbers = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

foreach ($numbers as $row) {
    if (is_array($row)) {
        echo key($row) . ' - ';
        foreach ($row as $value) {
            echo $value;
        }
        echo "<br/>";
    } else {
        echo $row;
    }
}

echo '<br>';

foreach ($numbers as $key => $row) {
    if (is_array($row)) {
        echo $key . ' - ';
        foreach ($row as $value) {
            echo $value;
        }
        echo "<br/>";
    } else {
        echo $row;
    }
}