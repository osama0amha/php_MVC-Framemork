<?php


use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$EnvData = [
    'dp' => [
        'hsd' => $_ENV['DP_HSD'],
        'username' => $_ENV['DP_USERNAME'],
        'password' => $_ENV['DP_PASSWORD']
    ],
];

$app = new Application(__DIR__, $EnvData);

$app->dp->AplayMigration();