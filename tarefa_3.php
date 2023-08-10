<?php


function calcularMedia(string $nomeArquivo): float {
    $arquivo = fopen($nomeArquivo, 'r'); 
    $notas = [];
    while (!feof($arquivo)) {
        $linha = fgets($arquivo); 
        $notas[] = explode(':', $linha)[1]; // explode a linha pelo caractere ':' e pega o segundo elemento do array gerado
    }
    fclose($arquivo);
    return array_sum($notas) / count($notas); // soma as notas e divide pela quantidade de notas
}

echo 'A média é: ' . calcularMedia('notas.txt') . PHP_EOL;


function maiorNota(string $nomeArquivo): string {
    $arquivo = fopen($nomeArquivo, 'r'); 
    $maiorNota = 0;
    $nomeAluno = '';
    while (!feof($arquivo)) {
        $linha = fgets($arquivo); 
        $nota = explode(':', $linha)[1]; // explode a linha pelo caractere ':' e pega o segundo elemento do array gerado
        if ($nota > $maiorNota) {
            $maiorNota = $nota;
            $nomeAluno = explode(':', $linha)[0]; // explode a linha pelo caractere ':' e pega o primeiro elemento do array gerado
        }
    }
    fclose($arquivo);
    return "O aluno com a maior nota é: $nomeAluno, com a nota: $maiorNota";
}

echo maiorNota('notas.txt') . PHP_EOL;