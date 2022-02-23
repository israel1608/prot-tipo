<?php
// Incluindo arquivo de conexão
require_once('config/conn.php');

// Funções de utilidade
require_once('funcs/util.php');

//$cpf = $_POST['cpf-cliente-emprestimo'];
//$id = $_POST['id-livro-emprestimo'];
$senhaCliente = md5($_POST['senha-cliente-emprestimo']);
//$senhaAdm = $_POST['senha-adm-emprestimo'];

/*if(empty($cpf)||empty($id)||empty($senhaCliente)||empty($senhaAdm)){
    echo retorno('Preencha todos os campos');
    exit();
}*/

$queryCliente = $pdo->prepare("SELECT situacao FROM clientes WHERE (/*cpf=:cpf AND*/senha=:senha)");
//$queryCliente->bindParam(":cpf",$cpf,PDO::PARAM_STR);
$queryCliente->bindParam(":senha", $senhaCliente, PDO::PARAM_STR);
$queryCliente->execute();


if(!$queryCliente->fetch()){
    echo retorno('Senha cliente incorreta');
    exit();
}

if($queryCliente->execute()){
    while($situacao = $queryCliente->fetch(PDO::FETCH_ASSOC)){
    
    if(strcasecmp($situacao['situacao'],'normal')==0 ){
        echo retorno('prossiga',true);
    }else if(strcasecmp($situacao['situacao'],'pendente')==0 ){
        echo retorno('Cliente possui empréstimos pendentes');
        exit();
    } else { 
        echo retorno('Cliente está em dívida');
        exit();
        }
    }
}else echo retorno($queryLivro->errorInfo());
    










//$queryLivro = $pdo->prepare('SELECT * FROM livros WHERE (id=:id)');



