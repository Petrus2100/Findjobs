<?php

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$bancoDeDados = $cliente->selectDatabase('FindJobs');
$cadastro = $bancoDeDados->selectCollection('cadastro');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário usando $_GET
    $email = $_POST["email"];
    $senha = $_POST["senha"];

$usuario = $cadastro->findOne(['email' => $email]);

if ($usuario && password_verify($senha, $usuario['senha'])) {
    // Credenciais válidas, pode redirecionar para a área restrita, exibir mensagem, etc.
    echo "Login bem-sucedido!";
} else {
    // Credenciais inválidas, exibe mensagem de erro, redireciona para a página de login, etc.
    echo "Credenciais inválidas. Tente novamente.";
    }

    header("Location: index.html");
    exit();
}
