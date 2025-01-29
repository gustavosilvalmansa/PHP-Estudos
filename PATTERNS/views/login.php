<?php
require_once "../init.php";
require_once "../controllers/UserController.php";
require_once "../strategies/AuthEmail.php";
require_once "../strategies/AuthCPF.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identificador = trim($_POST["identificador"]);
    $senha = trim($_POST["senha"]);
    $metodo = $_POST["metodo"];

    $userController = new UserController();

    // Choose authentication strategy
    $authStrategy = ($metodo === "email") ? new AuthEmail() : new AuthCPF();

    if ($userController->autenticar($authStrategy, $identificador, $senha)) {
        $_SESSION["user"] = [
            "nome" => $identificador, // Ideally, fetch the user name from DB
            "tipo" => $metodo // Just for reference
        ];
        header("Location: ../index.php");
        exit();
    } else {
        $erro = "Credenciais inválidas!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if ($erro): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="text" name="identificador" placeholder="Email ou CPF" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="metodo">
            <option value="email">Login por Email</option>
            <option value="cpf">Login por CPF</option>
        </select>
        <button type="submit">Login</button>
    </form>
</body>
</html>
