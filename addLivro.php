<?php
include("conexao.php");

$titulo = mysqli_real_escape_string($conexao,$_POST['titulo-livro-cadastro']);
$autor = mysqli_real_escape_string($conexao,$_POST['autor-livro-cadastro']);
$editora = mysqli_real_escape_string($conexao,$_POST['editora-livro-cadastro']);
$ano = mysqli_real_escape_string($conexao,$_POST['ano-livro-cadastro']);
$situaçao = mysqli_real_escape_string($conexao,$_POST['situaçao-livro-cadastro']);

$query = "insert into livros (titulo,autor,editora,ano,situaçao) values ('{$titulo}','{$autor}','{$editora}','{$ano}','{$situaçao}');";

$result = mysqli_query($conexao,$query);

if($result == 1){
    header('Location: painel.php');
    exit();
}




