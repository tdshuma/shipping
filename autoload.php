<?php

require_once 'vendor/autoload.php';

spl_autoload_register(function (string $className) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = __DIR__ . '/src/' . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();