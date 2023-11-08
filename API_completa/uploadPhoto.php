<?php


   

// Pega o caminho e o arquivo atarvés do caminho de diretórios dessa variavel 
    $pathUpload = "../Imagens/";
    
// Variavel que transtorma o texto em imagem
    $binaryData = base64_decode ($fotobase64, true);

    if (!$binaryData){

    	// Variavel que transforma a imagem em texto (string) novamente 
        $encondeData = base64_encode(file_get_contents($fotobase64));
        $binaryData = base64_decode ($encondeData);
        
    }


 	// Parte responsavel por fazer o updload da fotot para o banco de dados
    return file_put_contents($pathUpload .  $nameImagen.".jpg", $binaryData);


?>
