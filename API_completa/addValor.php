<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8, text/plain ');  


include 'conexao.php';


$dados = file_get_contents('php://input');

$array = json_decode($dados);

$recebe_idUsuario = $array  ->idUsuario;
$recebe_data =  $array  ->data;
$recebe_titulo = $array  ->titulo;
$recebe_descricao = $array  ->descricao;
$recebe_valor = $array  ->valor;
$recebe_tipo = $array  ->tipo;

if($recebe_data!=''){
    $inserir = $conexao->query("INSERT INTO tab_Valor (id_user, addData, titulo, descricao, valor, tipo) 
    VALUES ('$recebe_idUsuario','$recebe_data', '$recebe_titulo', '$recebe_descricao', '$recebe_valor', '$recebe_tipo')");
    $resposta = array('Resp'=> '0' );
}

ob_clean();
echo json_encode($resposta);
?>

