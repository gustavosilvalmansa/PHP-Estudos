<?php
$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = 2;
//$stmt = $conn->prepare("SELECT * FROM tb_usuarios order by deslogin");
$stmt = $conn->prepare("SELECT * FROM tb_usuarios WHERE idusuario = :ID order by idusuario");

$stmt->bindParam(":ID",$id);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);
	echo "<hr>";

foreach ($results as $row){

	foreach($row as $key => $value){
		echo "<b>" . $key . "</b> " . $value . "<br>";
	}	
	echo "<hr>";
}
?>