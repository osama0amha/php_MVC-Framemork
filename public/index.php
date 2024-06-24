<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->route->get('/content',[\app\Controller\ContentController::class,'content']);
$app->route->get('/','content');

$app->run();