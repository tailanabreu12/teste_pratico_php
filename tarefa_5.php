<?php

class Pessoa {
    private string $nome;
    private int $idade;

    public function __construct(string $nome, int $idade)
    {
        $this->setNome($nome);
        $this->setIdade($idade);
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function apresentar(): string
    {
        return "Olá, meu nome é {$this->getNome()} e tenho {$this->getIdade()} anos.";
    }
}

$pessoa = new Pessoa('João', 20);
echo $pessoa->apresentar() . PHP_EOL;