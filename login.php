<?php
include('conexao.php');

if(empty($_POST['admin'])||empty($_POST['senha-admin'])){
    header('Location: index.php');
    exit();
}

$admin = mysqli_real_escape_string($conexao,$_POST['admin']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha-admin']);

$query = "select admin_id, admin from login where admin = '{$admin}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao,$query);
$row = mysqli_num_rows($result);

if($row == 1){
    header('Location: painel.php');
    exit();
} else{
    header('Location: index.php');
    exit();
}

