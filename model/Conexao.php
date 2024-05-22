<?php
require '../vendor/autoload.php';

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$bancoDeDados = $cliente->selectDatabase('FindJobs');
$colecaoUsuarios = $bancoDeDados->selectCollection('cadastro');

try {
    // Tente selecionar um banco de dados existente para testar a conexão
    $bancoDeDados = $cliente->selectDatabase('FindJobs');
    echo "Conexão bem-sucedida!";
} catch (Exception $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>


