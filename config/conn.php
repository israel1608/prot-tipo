<?php

// Informações para conexão
$host = '127.0.0.1';
$usuario = 'root';
$senha = '';
$banco = 'gerenciador';
$dsn = "mysql:host={$host};port=3306;dbname={$banco}";

try 
{
    // Conectando
    $pdo = new PDO($dsn, $usuario, $senha);
} 
catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
}