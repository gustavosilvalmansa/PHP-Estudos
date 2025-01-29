<?php

require_once __DIR__ . "/Usuario.php";

class Admin implements Usuario {
    public function getTipo(): string {
        return "Administrador";
    }
}

?>
