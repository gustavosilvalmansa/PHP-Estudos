<?php
require_once("config.php");

$sql = new Sql();

$users = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

$headers = array();

foreach($users[0] as $key => $value){
	array_push($headers, ucfirst($key));
}


$file = fopen("usuarios.csv", "w+");

fwrite($file,implode(",",$headers)."\r\n"); // Implode, define separador

foreach($users as $row ){
	
	$data = array();
	
	foreach ($row as $key => $value){
		array_push($data,$value);
	}
	
	fwrite($file, implode(",", $data). "\r\n");

}

fclose($file);



?>