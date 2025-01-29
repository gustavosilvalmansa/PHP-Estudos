<?php

require_once __DIR__ . "/AuthStrategy.php";
require_once __DIR__ . "/../config/Database.php";

class AuthEmail implements AuthStrategy {
    public function autenticar(string $email, string $senha): bool {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $query->execute([$email, md5($senha)]);

        return $query->rowCount() > 0;
    }
}

?>
