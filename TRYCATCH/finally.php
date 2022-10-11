<?php
function trataNome($nome ){
	if(!$nome){
		throw new Exception("Nenhum nome informado!");
	}
	
	echo ucfirst($nome)."<br>";
	
}

try{
	trataNome("Joao");
	trataNome("");
	
}catch(Exception $e){
	echo $e->getMessage();
} finally{
	echo "<br>Executou o Try";
}


?>