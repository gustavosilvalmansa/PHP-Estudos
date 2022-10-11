<?php
$name = "images";

if (!is_dir($name)){//verify if  dir  images exists
	mkdir($name);//create dir
		echo "Diretório: $name criado com sucesso!";

}else{
	rmdir($name); // remove dir
	echo "Já existe o diretório: $name, foi removido ";
}

?>