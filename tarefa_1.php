<?php

function reverseWords(string $frase): string {
    $array = mb_str_split($frase); // transforma a string em um array de caracteres
    $array = array_reverse($array); // inverte o array
    return implode('', $array); // junta os elementos do array em uma string
}

echo reverseWords('Olá mundo!');






