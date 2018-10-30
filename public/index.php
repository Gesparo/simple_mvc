<?php

require __DIR__ . '/../vendor/autoload.php';

$router = new \App\Router\Router();

$router->register('/book', 'BooksController', 'show');
$router->register('/', 'IndexController', 'index');

$router->resolve();