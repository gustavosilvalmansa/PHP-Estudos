<?php
// $conn = new PDO("mysql:host=NOME_DO_HOST;dbname=NOME_DO_BANCO", "USUARIO_BANCO", "SENHA_BANCO"); 
$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$login = "JOSE";
$password = "15733";
$id = 2;

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID");
$stmt->bindParam(":LOGIN",$login);
$stmt->bindParam(":PASSWORD",$password);
$stmt->bindParam(":ID",$id);
$stmt->execute();

echo "atualizado";

?>