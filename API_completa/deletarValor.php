<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8, text/plain ');  


include 'conexao.php';

//vai pegar o conteudo do arquivo de entrada e colocar na variavel dados
$dados = file_get_contents('php://input');

$array = json_decode($dados);

$recebe_id_valor = $array  ->id_valor;
$recebe_dUser =  $array  ->dUser;
$recebe_receita = $array  ->receita;

if($recebe_id_valor!=''){
 $conexao->query("DELETE FROM tab_valor WHERE id = $recebe_id_valor");
 $resposta = array('Resp' => '1'); //caso tenha recebido algum dado que seja diferente de vazio ele deleta e retorna 1 para o aplicativo caso não tenha recebido ele não faz nada.
}

ob_clean();
echo json_encode($resposta);
?>

