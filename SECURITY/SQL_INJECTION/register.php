<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido!");
    }

    if (strlen($password) < 8) {
        die("A senha deve ter pelo menos 8 caracteres.");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password_hash
        ]);
        echo "Registro concluído!";
    } catch (PDOException $e) {
        echo "Erro ao registrar: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <input type="text" name="username" required placeholder="Usuário">
    <input type="email" name="email" required placeholder="E-mail">
    <input type="password" name="password" required placeholder="Senha">
    <button type="submit">Registrar</button>
</form>
