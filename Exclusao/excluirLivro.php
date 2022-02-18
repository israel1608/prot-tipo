<?php
// Incluindo arquivo de conexão
require_once('../config/conn.php');

// Funções de utilidade
require_once('../funcs/util.php');

$id = $_POST['id-livro-remover'];
$senha = md5($_POST['senha-adm-livro']);

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

$queryId = $pdo->prepare("SELECT * FROM livros WHERE (id=:id)");
$queryId->bindParam(':id', $id, PDO::PARAM_INT);
$queryId->execute();

if(!$queryId->fetch()){
    echo retorno('ID Inexistente!');
    exit();

}

$queryLivro = $pdo->prepare("DELETE FROM livros WHERE (id=:id)");
$queryLivro->bindParam(":id", $id,PDO::PARAM_INT);

echo ($queryLivro->execute()) ? retorno('Livro deletado com sucesso!', true) : retorno($queryLivro->errorInfo());









