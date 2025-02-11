<?php
require 'config/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido!");
    }

    try {
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); // Proteção contra XSS
            echo "Login bem-sucedido! Bem-vindo, " . $_SESSION['username'];
        } else {
            echo "E-mail ou senha incorretos!";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <input type="email" name="email" required placeholder="E-mail">
    <input type="password" name="password" required placeholder="Senha">
    <button type="submit">Entrar</button>
</form>
