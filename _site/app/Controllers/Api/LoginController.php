<?php

namespace App\Controllers\Api;

use Slim\Views\Twig as View;
use Slim\Router;

use Brunelencantado\Storage\SessionStorage;

use App\Controllers\ApiController;

class LoginController extends ApiController
{

    public function index($response, View $view)
    {

        define('LANGUAGE', $this->config->get('app')['default_locale']);
        $view->render($response, 'login.twig');

    }

    public function login($request, $response, Router $router, SessionStorage $storage)
    {

        $user = $request->getParam('user');
        $password = $request->getParam('password');

        if (password_verify($password, '$2y$10$EEpouiaw3jkIGdGov65MTeth2nBVlnut.Bk07Q5koMaA9jlJDrw/m')) {

            $storage->set('user', 'admin');
            return $response->withRedirect($router->pathFor('webadmin.default', ['language' => $this->config->get('app')['default_locale']]));

        }

    }

    public function logout($response, Router $router, SessionStorage $storage, $language)
    {

        $storage->delete('user');
        return $response->withRedirect($router->pathFor('home', [ 'language' => $language ]));

    }

}