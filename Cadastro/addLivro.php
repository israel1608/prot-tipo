<?php
// Incluindo arquivo de conexão
require_once('../config/conn.php');

// Funções de utilidade
require_once('../funcs/util.php');

$n = $_POST['qnt'];

if($n>10){
    echo retorno('Quantidade máxima permitida: 10');
    exit();
}

if($n<1){
    echo retorno('Quantidade inválida');
    exit();
}

$titulo = $_POST['titulo-livro-cadastro'];
$autor = $_POST['autor-livro-cadastro'];
$editora = $_POST['editora-livro-cadastro'];
$ano = $_POST['ano-livro-cadastro'];
$situacao = $_POST['situacao-livro-cadastro'];

if(empty($titulo)||empty($autor)||empty($editora)||empty($ano)){
    echo retorno("Preencha todos os dados");
    exit();
}

$stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, editora, ano, situacao) VALUES (:titulo, :autor, :editora, :ano, :situacao)");

$stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
$stmt->bindParam(':editora', $editora, PDO::PARAM_STR);
$stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
$stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR);

for($i=1;$i<$n;$i++){
    $stmt->execute();
}  

echo ($stmt->execute()) ? retorno('Livro(s) cadastrado(s) com sucesso !', true) : retorno($stmt->errorInfo());







/*$titulo = mysqli_real_escape_string($conexao,$_POST['titulo-livro-cadastro']);
$autor = mysqli_real_escape_string($conexao,$_POST['autor-livro-cadastro']);
$editora = mysqli_real_escape_string($conexao,$_POST['editora-livro-cadastro']);
$ano = mysqli_real_escape_string($conexao,$_POST['ano-livro-cadastro']);
$situaçao = mysqli_real_escape_string($conexao,$_POST['situaçao-livro-cadastro']);

$query = "insert into livros (titulo,autor,editora,ano,situaçao) values ('{$titulo}','{$autor}','{$editora}','{$ano}','{$situaçao}');";

$result = mysqli_query($conexao,$query);

if($result == 1){
    header('Location: painel.php');
    exit();
}*/




