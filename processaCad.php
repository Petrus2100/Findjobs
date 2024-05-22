<?php 
require 'vendor/autoload.php';
//COnectar ao mongoDB
$cliente = new MongoDB\Client("mongodb://localhost:27017");

//COnectar ao banco de dados
$bancoDeDados = $cliente->selectDatabase('FindJobs');

// conectar a coleção
$cadastro = $bancoDeDados->selectCollection('cadastro');

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nomeCompleto"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $dataNascimento = $_POST["dataNascimento"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];

    //Mascarar a senha com tipo hash
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);


$documento = [
    'nomeCompleto' => $nome,
    'email' => $email,
    'cpf' => $cpf,
    'senha' => $senhaHash,
    'telefone' => $telefone,
    'dataNascimento' => $dataNascimento,
    'estado' => $estado,
    'cidade' => $cidade,
    'bairro' => $bairro
];
// inserir dados
$cadastro->insertOne($documento);


header("Location: view/cadastro/formEnviado.html");

exit();
}
