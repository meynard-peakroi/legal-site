<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'api_url' => $_ENV['API_URL'],
    'api_key' => $_ENV['API_KEY'],
];
