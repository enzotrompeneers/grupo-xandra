<?php
// API routes

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

$app->post('/login/', ['\App\Controllers\Api\LoginController', 'login'])->setName('api.login');
$app->get('/{language}/logout/', ['\App\Controllers\Api\LoginController', 'logout'])->setName('api.logout');

$app->group('/webadmin/{language}', function() {

	$this->get('/', ['\App\Controllers\Api\WebadminController', 'index'])->setName('webadmin.default');
	$this->post('/create', ['\App\Controllers\Api\WebadminController', 'create'])->setName('webadmin.create');
	$this->get('/edit/{id}', ['\App\Controllers\Api\WebadminController', 'edit'])->setName('webadmin.edit');
	$this->post('/update/{id}', ['\App\Controllers\Api\WebadminController', 'update'])->setName('webadmin.update');
	$this->get('/delete/{id}', ['\App\Controllers\Api\WebadminController', 'delete'])->setName('webadmin.delete');
	
})->add(new App\Middleware\LoginMiddleware($container));