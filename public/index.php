<?php

use app\core\Application;
require_once dirname(__DIR__).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$EnvData = [
    'ClassUser'=> \app\Model\User::class,
    'dp'=> [
        'hsd'=>$_ENV['DP_HSD'],
        'username'=>$_ENV['DP_USERNAME'],
        'password'=>$_ENV['DP_PASSWORD']
    ],
];

$app = new Application(dirname(__DIR__),$EnvData);

$app->route->get('/content',[\app\Controller\ContentController::class,'content']);
$app->route->get('/login',[\app\Controller\AuthController::class , 'login']);
$app->route->post('/login',[\app\Controller\AuthController::class , 'login']);
$app->route->get('/register',[\app\Controller\AuthController::class , 'register']);
$app->route->post('/register',[\app\Controller\AuthController::class , 'register']);
$app->route->get('/logout',[\app\Controller\AuthController::class , 'logout']);

$app->route->get('/','home');


$app->run();