<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\core\database\Connection;
use app\core\database\QueryBuilder;
use app\controllers\WorkController;

Application::bind('config', require './../config.php');

Application::bind('DB', new QueryBuilder(Connection::make(Application::get('config')['DB'])));

$app = new Application(dirname(__DIR__));


$app->router->get('/', [WorkController::class, 'index']);
$app->router->get('/works', [WorkController::class, 'index']);

$app->router->get('/works/create', [WorkController::class, 'create']);
$app->router->post('/works/store', [WorkController::class, 'store']);

$app->router->get('/works/edit', [WorkController::class, 'edit']);
$app->router->post('/works/edit', [WorkController::class, 'update']);

$app->router->get('/works/delete', [WorkController::class, 'delete']);

$app->router->get('/works/calendar', [WorkController::class, 'calendar']);

$app->run();