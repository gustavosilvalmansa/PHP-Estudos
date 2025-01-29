<?php

require_once __DIR__ . "/../factories/UsuarioFactory.php";
require_once __DIR__ . "/../strategies/AuthEmail.php";
require_once __DIR__ . "/../strategies/AuthCPF.php";

class UserController {
    public function registrar(string $tipo, string $nome, string $email, string $cpf, string $senha): bool {
        $db = Database::getInstance()->getConnection();

        $usuario = UsuarioFactory::criarUsuario($tipo);
        $query = $db->prepare("INSERT INTO usuarios (nome, email, cpf, senha, tipo) VALUES (?, ?, ?, ?, ?)");
        return $query->execute([$nome, $email, $cpf, md5($senha), $usuario->getTipo()]);
    }

    public function autenticar(AuthStrategy $strategy, string $identificador, string $senha): bool {
        return $strategy->autenticar($identificador, $senha);
    }
}

?>
