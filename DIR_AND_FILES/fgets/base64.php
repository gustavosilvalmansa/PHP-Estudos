<?php

$filename ="saude.jpg";

$base64 = base64_encode(file_get_contents($filename)); // PEGAR O CONTEUDO DA VARIAVEL FILENAME E CONVERTTE EM BASE64

$fileinfo = new finfo(FILEINFO_MIME_TYPE); // CONSTANTE PARA VERIFICAR A EXTENSÃO DO ARQUIVO

$mimetype = $fileinfo->file($filename); // RETORNA A EXTENSÃO DO ARQUIVO $FILENAME
//var_dump($base64);

$base64encode =  "data:" . $mimetype . ";base64," . $base64;

?>


<img src="<?=$base64encode?>" alt="teste">

<a href="<?=$base64encode?>" target="_blank" > Link para img </a>
