<?php
header('Content-type: application/json');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header("Access-Control-Allow-Origin: *", false);


include 'conexao.php';


//
$dados = file_get_contents('php://input');

$array = json_decode($dados);

//recebe o id decodificado presente no array
$recebe_id = $array  ->id;

//consulta dos dados da tab_valor (lançamentos financeiros)
$consulta = $conexao->query("SELECT * FROM tab_valor WHERE id_user='$recebe_id' ");

//condifciona if: prossegue caso o usário tenha um lançamento
//condiciona else: caso o usuario não tenha, 0 será enviado e uma mebnsagem será exibida
if ($consulta->rowCount()==0) {
    $resposta = array('Resp'=> '0'  );
}else{
	//exibe as informações do lançamento
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