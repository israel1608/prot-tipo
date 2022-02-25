<?php
// Incluindo arquivo de conexão
require_once('config/conn.php');

$sql = "SELECT * FROM livros ORDER BY situacao DESC";
$consulta = $pdo->prepare($sql);
$data = array();

if($consulta->execute()){

    while($result = $consulta->fetch(PDO::FETCH_ASSOC)){

        $info['id'] = $result['id'];
        $info['titulo'] = $result['titulo'];
        $info['autor'] = $result['autor'];
        // $info['editora'] = $result['editora'];
        $info['ano'] = $result['ano'];
        $info['situacao'] = $result['situacao'];
        array_push($data,$info); 
    }
}else echo($consulta->errorInfo());

$arquivo = 'data.json';//tranformando em json
$json = json_encode($data);
$file = fopen(__DIR__ . '/' . $arquivo,'w');
fwrite($file, $json);//salvando o arquivo json no servidor
fclose($file); 






