<?php
include('config/conn.php');

if(empty($_POST['admin'])||empty($_POST['senha-admin'])){
    header('Location: index.php');
    exit();
}

$admin = $_POST['admin'];
$senha = md5($_POST['senha-admin']);

$stmt = $pdo->prepare('SELECT * FROM login WHERE (admin=:admin AND senha=:senha)');

$stmt->bindParam(':admin', $admin,PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha,PDO::PARAM_STR);
$stmt->execute();

if($stmt->fetch()){
header("Location: painel.php");
exit();
}   else{
    header("Location: index.php");
    exit();
}





/*$admin = mysqli_real_escape_string($conexao,$_POST['admin']);
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
}*/

