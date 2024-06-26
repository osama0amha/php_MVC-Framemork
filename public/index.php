<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->route->get('/content',[\app\Controller\ContentController::class,'content']);
$app->route->get('/login',[\app\Controller\AuthController::class , 'login']);
$app->route->post('/login',[\app\Controller\AuthController::class , 'login']);
$app->route->get('/register',[\app\Controller\AuthController::class , 'register']);
$app->route->post('/register',[\app\Controller\AuthController::class , 'register']);

$app->run();