<?php
header('Content-type: application/json');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header("Access-Control-Allow-Origin: *", false);


include 'conexao.php';

$dados = file_get_contents('php://input');


$dados = file_get_contents('php://input');
$array = json_decode($dados);
//$recebe_id = $array  ->id;
$recebe_id = '90';

$consulta = $conexao->query("SELECT * FROM tab_valor WHERE id_user='$recebe_id' ");


if ($consulta->rowCount()==0) {
    $resposta = array('Resp'=> '0'  );
}else{
    while($exibe=$consulta->fetch(PDO::FETCH_ASSOC)){
        $resposta []= array('id' => $exibe['id'],
        'data' => $exibe['addData'],
        'titulo' => $exibe['titulo'],
        'descricao' => $exibe['descricao'],
        'valor' =>$exibe['valor'],
        'tipo' =>$exibe['tipo']);
    }
}

ob_clean();
echo json_encode($resposta);
?>