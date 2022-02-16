<?php
include('config/conn.php');

$titulo = $_POST['titulo-livro-cadastro'];
$autor = $_POST['autor-livro-cadastro'];
$editora = $_POST['editora-livro-cadastro'];
$ano = $_POST['ano-livro-cadastro'];
$situacao = $_POST['situacao-livro-cadastro'];

$stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, editora, ano, situaçao) VALUES (:titulo, :autor, :editora, :ano, :situacao)");

$stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
$stmt->bindParam(':editora', $editora, PDO::PARAM_STR);
$stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
$stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR);

if($stmt->execute()){
    header('Location: painel.php');
    exit();
};







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




