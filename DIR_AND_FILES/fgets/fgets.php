<?php

$filename = "usuarios.csv";
if(file_exists($filename)){
	
	$file = fopen($filename, "r");
	
	$data = array();
	
	$headers = explode(",", fgets($file)); // Remove as virgulas do header do CSV, transformando em array
	
	while($row = fgets($file)){ // Enquanto existirem linhas no arquivo
		
		$rowData = explode(",", $row); // Remove as virgulas das linhas
		
		$linha = array();
		
		for($i = 0; $i < count($rowData); $i++){ // Repete utilizand o numero de linhas como parametro
			
			$linha[$headers[$i]] = $rowData[$i];	  // Atribui valores ao header, transformando em um array
			
		}
		
		array_push($data, $linha); // Insere os dados no vetor $data
	}
	
	fclose($file);
	echo json_encode($data); //Transforma em Json
}


?>