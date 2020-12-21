<?php
require_once __DIR__.'/../vendor/autoload.php';

try {
    (Dotenv\Dotenv::create(__DIR__))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    echo ".env for test is missing.";
    exit(1);
}

echo env('DB_HOST', '127.0.0.1');
echo env('DB_PORT', '3306');
echo env('DB_DATABASE', 'forge');

require_once 'bootstrap/app.php';
