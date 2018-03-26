<?php

namespace App\Middleware;

class LoginMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
       
        $router = $this->container->get('router');
        $config = $this->container->get('Noodlehaus\Config');
        $storage = $this->container->get('Brunelencantado\Storage\SessionStorage');

        $user = $storage->get('user');

        if (!$user == 'admin') {
            
            return $response->withRedirect($router->pathFor('home', ['language' => $config->get('app')['default_locale']]));

        }
        
        return $next($request, $response);
    }


}