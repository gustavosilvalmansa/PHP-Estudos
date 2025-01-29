<?php

require_once __DIR__ . "/AuthStrategy.php";
require_once __DIR__ . "/../config/Database.php";

class AuthCPF implements AuthStrategy {
    public function autenticar(string $cpf, string $senha): bool {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM usuarios WHERE cpf = ? AND senha = ?");
        $query->execute([$cpf, md5($senha)]);

        return $query->rowCount() > 0;
    }
}

?>
