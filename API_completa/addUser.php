<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8, text/plain ');  

/* método para inserir código de um outro arquivo php, no caso está sendo feita a conexão do banco de dados feita no arquivo conexão
*/
include 'conexao.php';

/*Este método pega o conteúdo do arquivo para a entrda do phph, no nosso caso o arquivo json com os dados do usuários
*/
$dados = file_get_contents('php://input');

/*Este método pega o conteúdo do arquivo json e transforma os dados em um vetor, sendo mais fácil de ser acessada pelo código
*/
$array = json_decode($dados);
$recebe_email =  $array  ->email;
$recebe_senha = $array  ->senha;
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

$date = date('Y-m-d');

//$token = str_shuffle("ABCD1234");

$nameImagen= "";


/* Consulta no banco de dados, na tabela usuário. Caso o usuário já esteja cadastro, o código retornará o email ao usuário já cadastrado*/
$consulta = $conexao->query("SELECT * FROM tab_user WHERE email='$recebe_email'");

/* codigo que, de acordo com a consulta, cadastrará ou não o usuário*/
if ($consulta->rowCount()==0) {

        //Foto
    if(!empty($fotobase64)){
        // Md5 = cripitografa essa hora
        
        //times = hora atual (é um valor numérico em segundos entre a hora atual e o valor em 1º de janeiro de 1970 00:00:00 Horário de Greenwich)
        $nameImagen= md5(time());
        //Include do arquivo para upload da foto no banco de dados
        include 'uploadPhoto.php';
    }
    //inseri todas as informações/dados usadas (ou não) até momento 
    $inserir = $conexao->query("INSERT INTO tab_user (dataCadastro, email, senha, nome, sobrenome, telefone, sexo, nasc, cep, endereco, numero, complemento, bairro, cidade, imagem, receitaTotal) 
    VALUES ('$date', '$recebe_email', '$recebe_senha', '$recebe_nome', '$recebe_sobreNome', '$recebe_telefone', '$recebe_sexo', '$recebe_nasc', 
    '$recebe_cep', '$recebe_endereco', '$recebe_numero', '$recebe_complemento', '$recebe_bairro', '$recebe_cidade', '$nameImagen', 0)");
    $resposta = array('Resp'=> '0' );


}else{
    $resposta = array('Resp'=> '1'  );
}

ob_clean();
echo json_encode($resposta);
?>

