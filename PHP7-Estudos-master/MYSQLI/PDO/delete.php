<?php
//$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt=$conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID");
$id=6;
$stmt->bindParam(":ID",$id);
$stmt->execute();

echo"Excluido";

?>