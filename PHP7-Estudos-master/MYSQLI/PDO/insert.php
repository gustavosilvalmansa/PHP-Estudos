<?php
$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(:LOGIN, :PASSWORD)");

$login = "JOSE";
$password ="12345678";

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

$stmt->execute();

echo "Inserido!";

?>