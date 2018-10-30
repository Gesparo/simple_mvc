<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Globals\Globals;
use App\Router\Router;

Globals::init();

$router = new Router();

$router->register('/book', 'BooksController', 'show');
$router->register('/', 'IndexController', 'index');

$router->resolve();