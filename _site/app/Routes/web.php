<?php
// Web routes

use Interop\Container\ContainerInterface;
use DI\ContainerBuilder;
use DI\Bridge\Slim\App;

$app->get('/admin[/]', ['\App\Controllers\Api\LoginController', 'index'])->setName('web.login');

$app->get('/', ['\App\Controllers\Web\MainController', 'index'])->setName('home');