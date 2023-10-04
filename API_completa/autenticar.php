<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');

include 'conexao.php';

$dados = file_get_contents('php://input');
$array = json_decode($dados);
$recebe_email = $array  ->email;
$recebe_senha = $array  ->senha;


$consulta = $conexao->query("SELECT * FROM tab_user WHERE email='$recebe_email' AND senha='$recebe_senha'");

if ($consulta->rowCount()==0) { 
    $resposta = array('Resp'=> '0');

}else {
        $exibe=$consulta->fetch(PDO::FETCH_ASSOC);
        $resposta = array('Resp'=> '1',
                            'id' => $exibe['idUser'],
                            'email' => $exibe['email'],
                            'senha' => $exibe['senha'],
                            'nome' => $exibe['nome'],
                            'sobrenome' => $exibe['sobrenome'],
                            'telefone' => $exibe['telefone'],
                            'sexo' => $exibe['sexo'],
                            'nasc' => $exibe['nasc'],
                            'cep' => $exibe['cep'],
                            'endereco' => $exibe['endereco'],
                            'numero' => $exibe['numero'],
                            'complemento' => $exibe['complemento'],
                            'bairro' => $exibe['bairro'],
                            'cidade' => $exibe['cidade'],
                            'imagem' => $exibe['imagem'],
                            'receita' => $exibe['receitaTotal']);
    }

ob_clean();

echo json_encode($resposta);

?>