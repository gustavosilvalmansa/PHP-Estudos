<?php


if(!is_dir("images")) mkdir("images");
foreach (scandir("images") as $item){
	if(!in_array($item, array(".",  ".."))){
		unlink("images/".$item);
	}
}


/* cria e exclui arquivo teste.txt
$file = fopen("teste.txt","w+");
fclose($file);
unlink("teste.txt");;
*/
echo "removido";

?>