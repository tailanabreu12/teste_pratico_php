<?php

$arrayNumerico = range(1, 10);

foreach ($arrayNumerico as $numero) {
    if ($numero % 2 === 0) {
        echo $numero . PHP_EOL;
    }
}

function somaArray(array $array): int {
    $soma = 0;
    foreach ($array as $numero) {
        $soma += $numero;
    }
    return $soma;
}

echo somaArray($arrayNumerico) . PHP_EOL;