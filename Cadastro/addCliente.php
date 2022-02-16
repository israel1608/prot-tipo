<?php
// Incluindo arquivo de conexão
require_once('../config/conn.php');

// Funções de utilidade
require_once('../funcs/util.php');

$nome = $_POST['nome-cliente-cadastro'];
$email = $_POST['email-cliente-cadastro'];
$telefone = $_POST['telefone-cliente-cadastro'];
$cpf = $_POST['cpf-cliente-cadastro'];
$senha = md5($_POST['senha-cliente-cadastro']);
$situacao = $_POST['situacao-cliente-cadastro'];

$stmt = $pdo->prepare("INSERT INTO clientes (nome,email,telefone,cpf,senha,situacao) VALUES (:nome,:email,:telefone,:cpf,:senha,:situacao);");

$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
$stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
$stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR);

echo ($stmt->execute()) ? retorno('Cliente cadastrado com sucesso', true) : retorno($stmt->errorInfo());