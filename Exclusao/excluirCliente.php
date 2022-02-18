<?php
// Incluindo arquivo de conexão
require_once('../config/conn.php');

// Funções de utilidade
require_once('../funcs/util.php');

$id = $_POST['id-cliente-remover'];
$senha = md5($_POST['senha-adm-cliente']);

if(empty($id)||empty($senha)){
    echo retorno('Preencha todos os campos');
    exit();
}

$querySenha = $pdo->prepare("SELECT * FROM login WHERE (senha=:senha)");
$querySenha->bindParam(':senha', $senha, PDO::PARAM_STR);

$querySenha->execute();

if(!$querySenha->fetch()){
    echo retorno('Senha incorreta!');
    exit();
}

$queryId = $pdo->prepare("SELECT * FROM clientes WHERE (cpf=:id)");
$queryId->bindParam(':id', $id, PDO::PARAM_STR);
$queryId->execute();

if(!$queryId->fetch()){
    echo retorno('CPF Inexistente!');
    exit();
}

$queryLivro = $pdo->prepare("DELETE FROM clientes WHERE (cpf=:id)");
$queryLivro->bindParam(":id", $id,PDO::PARAM_STR);

echo ($queryLivro->execute()) ? retorno('Cliente deletado com sucesso!', true) : retorno($queryLivro->errorInfo());