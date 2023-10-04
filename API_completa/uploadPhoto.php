<?php


   // $namefile ="teste1.jpg";

    $pathUpload = "../Imagens/";

    $binaryData = base64_decode ($fotobase64, true);

    if (!$binaryData){

        $encondeData = base64_encode(file_get_contents($fotobase64));
        $binaryData = base64_decode ($encondeData);
        
    }

    return file_put_contents($pathUpload .  $nameImagen.".jpg", $binaryData);


?>
