<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'DB' => [
        'DB_DATABASE' => $_ENV['DB_DATABASE'],
        'DB_USERNAME' => $_ENV['DB_USERNAME'],
        'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
        'DB_CONNECTION' => $_ENV['DB_CONNECTION'],
        'DB_HOST' => $_ENV['DB_HOST'],
        'DB_PORT' => $_ENV['DB_PORT'],
    ],
];