<?php
// serve para dizer que página (ou tela) pode acessar a API
header('Access-Control-Allow-Origin: *');

//Checar
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8'); 

//Senha e Usuário do banco de dados

$usuario = 'root';
$senha = '';

// try e catch, método do php
try{

//conexão com banco de dados com método PDO do PHP
$conexao = new PDO("mysql:host=localhost;dbname=organizze;charset=utf8",$usuario,$senha);

ob_clean();

echo 'Conexão realizada com sucesso!!';

} 
// Método catch para exibir erro de conexão com banco de dados
catch(PDOException $e){
    echo $e->getMessage();
    echo 'Conexão com Problemas!!';
}
// Essa pagina server para conexão com banco de dados
?>

