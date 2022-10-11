<?php
//$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->beginTransaction(); // Prepara a transação


$stmt=$conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID");
$id=4;
$stmt->bindParam(":ID",$id);
$stmt->execute();

$conn->rollback(); // Usar se a transação deu erro
$conn->commit(); // Usar se a transação esta ok, confirma o comando!
echo"Excluido";

?>