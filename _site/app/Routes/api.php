<?php
// API routes

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

$app->post('/login/', ['\App\Controllers\Api\LoginController', 'login'])->setName('api.login');
$app->get('/{language}/logout/', ['\App\Controllers\Api\LoginController', 'logout'])->setName('api.logout');

$app->group('/webadmin/{language}', function() {

	$this->get('/', ['\App\Controllers\Api\WebadminController', 'index'])->setName('webadmin.default');
	
	
})->add(new App\Middleware\LoginMiddleware($container));



