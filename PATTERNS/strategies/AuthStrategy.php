<?php

interface AuthStrategy {
    public function autenticar(string $identificador, string $senha): bool;
}

?>
