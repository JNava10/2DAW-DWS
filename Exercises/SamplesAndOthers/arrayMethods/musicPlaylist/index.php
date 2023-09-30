<?php
/*
 * Tenemos una playlist de una plataforma de musica. Por ello, queremos añadir
 * y eliminar canciones, entre otras cosas.
 * */

echo '<h1>Playlist de canciones.</h1>';

$songs = [
    'Cuaderno de bitácora' => 'Ayax',
    'ANIMA' => 'ReoNa',
    'Ashes on The Fire' => 'Kohta Yamamoto',
    'Harakiri' => 'Duki, C.R.O',
    'Numb' => 'Linkin Park',
    'THE DEATH OF PEACE OF MIND' => 'Bad Omens'
];

$genres = [
    'Rap',
    'JPop',
    'Drill',
    'Rock'
];

echo '<h2>Lista de canciones</h2>';
foreach ($songs as $song => $artist) {
    echo "$song - $artist<br/>";
}

echo '<h2>Lista de generos</h2>';
foreach ($genres as $genre) {
    echo "$genre<br/>";
}

array_push($genres, 'Reggaeton');
$genres[] = 'Trap';

echo '<h3>Añadiendo nuevos generos</h3>';
foreach ($genres as $genre) {
    echo "$genre<br/>";
}

echo '<h3>Quitando la ultima cancion</h3>';
array_pop($songs);
foreach ($songs as $song => $artist) {
    echo "$song - $artist<br/>";
}

echo '<h3>Quitando el primer genero:</h3>';
array_shift($genres);

foreach ($genres as $genre) {
    echo "$genre<br/>";
}

echo '<h2>Generando una cola de reproduccion aleatoria:</h2>';
$queue = $songs;
$shuffled = shuffle($queue);

if ($shuffled) {
    foreach ($queue as $song => $artist) {
        $i = 1;
        echo "$i. $song - $artist<br>";
        $i++;
    }
}