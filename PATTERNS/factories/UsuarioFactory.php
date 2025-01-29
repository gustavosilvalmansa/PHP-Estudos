<?php

require_once __DIR__ . "/../models/Usuario.php"; // Ensure interface is loaded
require_once __DIR__ . "/../models/Cliente.php";
require_once __DIR__ . "/../models/Admin.php";

class UsuarioFactory {
    public static function criarUsuario(string $tipo): Usuario {
        switch (strtolower($tipo)) {
            case "cliente":
                return new Cliente();
            case "admin":
                return new Admin();
            default:
                throw new InvalidArgumentException("Tipo de usuário inválido: " . htmlspecialchars($tipo));
        }
    }
}

?>
