<?php

// Incluindo arquivo de conexão
require_once('../config/conn.php');

if(!isset($_POST['busca-consulta'])){

    exit();

}else{
    
    $nome = "%".trim($_POST['busca-consulta'])."%";
    $numero = $_POST['busca-consulta'];
    
    $busca = $pdo->prepare("select * from livros  where titulo like :nome or autor like :nome or editora like :nome or id like :numero or ano like :numero;");
    /* */ 
    $busca->bindParam(':nome',$nome,PDO::PARAM_STR);
    $busca->bindParam(':numero',$numero,PDO::PARAM_STR);
    
    if($busca->execute()){

    $dataBusca = array();

    while($result = $busca->fetch(PDO::FETCH_ASSOC)){

        $info['id'] = $result['id'];
        $info['titulo'] = $result['titulo'];
        $info['autor'] = $result['autor'];
        // $info['editora'] = $result['editora'];
        $info['ano'] = $result['ano'];
        $info['situacao'] = $result['situacao'];
        array_push($dataBusca,$info); 
    } 
    
    }else echo($busca->errorInfo());
    
    $arquivo = 'busca.json';
    $json = json_encode($dataBusca);//tranformando em json
    $file = fopen(__DIR__ . '/' . $arquivo,'w');
    fwrite($file, $json);//salvando o arquivo json no servidor
    fclose($file);

    echo "<script>window.close();</script>";
}

 








    