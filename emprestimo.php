<?php
// Incluindo arquivo de conexão
require_once('config/conn.php');

// Funções de utilidade
require_once('funcs/util.php');

$cpf = $_POST['cpf-cliente-emprestimo'];
$id = $_POST['id-livro-emprestimo'];
$senhaCliente = md5($_POST['senha-cliente-emprestimo']);
$senhaAdm = md5($_POST['senha-adm-emprestimo']);

//Analise se todos os campos estao preenchido
if(empty($cpf)||empty($id)||empty($senhaCliente)||empty($senhaAdm)){
    echo retorno('Preencha todos os campos');
    exit();
}

$queryLivro = $pdo->prepare("SELECT situacao FROM livros WHERE (id=:id)");
$queryLivro->bindParam(':id', $id ,PDO::PARAM_INT);
$queryLivro->execute();

//verifica se id do livro existe
if(!$queryLivro->fetch()){
        echo retorno('ID inexistente!');
        exit();
}

if($queryLivro->execute()){
    //verifica se o livro já foi alugado
    while($stcLivro = $queryLivro->fetch(PDO::FETCH_ASSOC)){
        if(strcasecmp($stcLivro['situacao'],'Alugado')==0 ){
            echo retorno('Livro já alugado!');
            exit();
        }
    }
}else echo retorno($queryLivro->errorInfo());


$queryCliente = $pdo->prepare("SELECT situacao FROM clientes WHERE (cpf=:cpf AND senha=:senha)");
$queryCliente->bindParam(":cpf",$cpf,PDO::PARAM_STR);
$queryCliente->bindParam(":senha", $senhaCliente, PDO::PARAM_STR);
$queryCliente->execute();

//analisa os dados do cliente do formulario

if(!$queryCliente->fetch()){
    echo retorno('CPF ou senha incorreto(s)');
    exit();
}

//guarda e verifica a situaçao do CLIENTE

if($queryCliente->execute()){
    while($situacao = $queryCliente->fetch(PDO::FETCH_ASSOC)){

    //SITUAÇAO do cliente NORMAL

    if(strcasecmp($situacao['situacao'],'normal')==0 ){

        $querySenha = $pdo->prepare("SELECT nome FROM login WHERE (senha=:senha)");
        $querySenha->bindParam(':senha', $senhaAdm, PDO::PARAM_STR);

        $querySenha->execute();

        if(!$querySenha->fetch()){
            echo retorno('Senha adm incorreta!');
            exit();
        }

        //caso a senha de adm seja VALIDA

        if($querySenha->execute()){
            //guarda o nome do adm responsavel pelo emprestimo
            while($responsavel = $querySenha->fetch(PDO::FETCH_ASSOC)){
            // inserçao do emprestimo

                $queryFinal = $pdo->prepare("INSERT INTO emprestimo (cpf_cliente,id_livro,adm) VALUES(:cpf,:id,:nome)");
                $queryFinal->bindParam(':cpf',$cpf,PDO::PARAM_STR);
                $queryFinal->bindParam(':id',$id,PDO::PARAM_INT);
                $queryFinal->bindParam(':nome',$responsavel['nome'],PDO::PARAM_STR);

                if($queryFinal->execute()){
                    //update da situaçao do livro para ALUGADO

                    $situacaoLivro = $pdo->prepare('UPDATE livros SET situacao="Alugado" WHERE id=:id');
                    $situacaoLivro->bindParam(':id',$id ,PDO::PARAM_INT);

                    if($situacaoLivro->execute()){
                        //update da situaçao do CLIENTE para PENDENTE

                        $situacaoCliente = $pdo->prepare('UPDATE clientes SET situacao="Pendente" WHERE cpf=:cpf');
                        $situacaoCliente->bindParam(':cpf',$cpf ,PDO::PARAM_STR);

                        echo ($situacaoCliente->execute()) ? retorno('Emprestimo realizado com sucesso!', true) : retorno($situacaoCliente->errorInfo());

                    } else echo retorno($situacaoLivro->errorInfo());

                }else echo retorno($queryFinal->errorInfo());
            }
        }else echo retorno($querySenha->errorInfo());

    //SITUAÇAO do cliente emprestimos PENDENTES    

    }else if(strcasecmp($situacao['situacao'],'Pendente')==0 ){
        echo retorno('Cliente possui empréstimos pendentes');
        exit();

    //SITUAÇAO do cliente em DIVIDA

    } else {  
        echo retorno('Cliente está em dívida');
        exit();
        }
    }
}else echo retorno($queryLivro->errorInfo());
    



