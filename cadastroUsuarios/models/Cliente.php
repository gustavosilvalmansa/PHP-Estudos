<?php

require_once __DIR__ . "/Usuario.php";

class Cliente implements Usuario {
    public function getTipo(): string {
        return "Cliente";
    }
}

?>
