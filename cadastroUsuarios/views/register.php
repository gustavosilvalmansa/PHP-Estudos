<?php
require_once "../init.php";
require_once "../controllers/UserController.php";

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $cpf = trim($_POST["cpf"]);
    $senha = trim($_POST["senha"]);
    $tipo = $_POST["tipo"];

    $userController = new UserController();

    if ($userController->registrar($tipo, $nome, $email, $cpf, $senha )) {
        $sucesso = "Cadastro realizado com sucesso! <a href='login.php'>Faça login</a>";
    } else {
        $erro = "Erro ao cadastrar. Verifique os dados e tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <?php if ($erro): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>
    
    <?php if ($sucesso): ?>
        <p style="color: green;"><?= htmlspecialchars($sucesso) ?></p>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="cpf" placeholder="CPF (000.000.000-00)" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="tipo">
            <option value="Cliente">Cliente</option>
            <option value="Administrador">Administrador</option>
        </select>
        <button type="submit">Registrar</button>
    </form>

    <p><a href="login.php">Já tem uma conta? Faça login</a></p>
</body>
</html>
