<?php

$produtos = [
    [
        'id' => 1,
        'nome' => 'Açucar',
        'preco' => 5.00,
        'quantidade' => 30
    ],
    [
        'id' => 2,
        'nome' => 'Molho de tomate',
        'preco' => 3.00,
        'quantidade' => 200
    ],
    [
        'id' => 3,
        'nome' => 'Macarrão',
        'preco' => 6.00,
        'quantidade' => 20
    ],
    [
        'id' => 4,
        'nome' => 'Manteiga',
        'preco' => 13.00,
        'quantidade' => 50
    ],
    [
        'id' => 5,
        'nome' => 'Arroz',
        'preco' => 4.00,
        'quantidade' => 100
    ]
];


try {
    //Toda parte da conexão ficaria separado em um ambiente real
    $pdo = new PDO('mysql:host=localhost;dbname=nome_banco', 'usuario', 'senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($produtos as $produto) {
        $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)');
        $stmt->bindParam(':nome', $produto['nome']);
        $stmt->bindParam(':preco', $produto['preco']);
        $stmt->bindParam(':quantidade', $produto['quantidade']);
        $stmt->execute();
        echo "{$produto['nome']} inserido com sucesso!" . "<br>";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    die();
}

try {
    //Toda parte da conexão ficaria separado em um ambiente real
    $pdo = new PDO('mysql:host=localhost;dbname=nome_banco', 'usuario', 'senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE preco > :preco');
    $stmt->bindParam(':preco', 50);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtos as $produto) {
        echo "Nome: {$produto['nome']} - Preço: {$produto['preco']} - Quantidade: {$produto['quantidade']}" . "<br>";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    die();
}