<?php

session_start();

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . "/config/",
        __DIR__ . "/models/",
        __DIR__ . "/factories/",
        __DIR__ . "/strategies/",
        __DIR__ . "/controllers/",
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Database connection test
try {
    Database::getInstance();
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

?>
