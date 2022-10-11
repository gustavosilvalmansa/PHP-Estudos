<?php
$link ="https://invia.com.br/cert/assets/images/logotipo-sem-fundo-horizontal-5181x944teste.png";

$content = file_get_contents($link);

$parse = parse_url($link);

$basename = basename($parse["path"]);

$file = fopen($basename, "w+");

fwrite($file,$content);

fclose($file);


?>

<img src="<?=$basename?>" alt="img" >