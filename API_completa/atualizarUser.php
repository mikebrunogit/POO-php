<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8, text/plain ');  


include 'conexao.php';


//pega dados através do método 
$dados = file_get_contents('php://input');


//variavel que contem os dados do arquivo em json de forma legivel para o php
$array = json_decode($dados);
$recebe_id_user =  $array  ->id_user;
$recebe_nome = $array  ->nome;
$recebe_sobreNome = $array  ->sobrenome;
$recebe_telefone = $array  ->telefone;
$recebe_sexo = $array  ->sexo;
$recebe_nasc = $array  ->nasc;
$recebe_cep = $array  ->cep;
$recebe_endereco = $array  ->endereco;
$recebe_numero = $array  ->numero;
$recebe_complemento = $array  ->complemento;
$recebe_bairro = $array  ->bairro;
$recebe_cidade = $array  ->cidade;
$fotobase64 = $array  ->foto;
$nameImagen = $array  ->nomefoto;
                             
// parte responsavel por atualizar os dados do usuário no banco de dados
$update= $conexao->query("UPDATE  tab_user SET 
                                nome='$recebe_nome',
                                sobrenome='$recebe_user',
                                telefone='$recebe_telefone',
                                sexo='$recebe_sexo',
                                nasc='$recebe_nasc',
                                cep='$recebe_cep',
                                endereco='$recebe_endereco',
                                numero='$recebe_numero',
                                complemento='$recebe_complemento',
                                bairro='$recebe_bairro',
                                cidade='$recebe_cidade',
                                imagem='$nameImagen'
                                where idUser='$recebe_id_user'");




 

// caso o usuário não tenha foto de perfil, este include mostrara o caminho para o ususário inserir foto de perfil  
    if(!empty($fotobase64)){
      include 'uploadPhoto.php';
    }

    //exibe as informações já atualizadas do usuário
    $consulta = $conexao->query("SELECT * FROM tab_user WHERE idUser='$recebe_id_user'");
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



ob_clean();
echo json_encode($resposta);
?>

