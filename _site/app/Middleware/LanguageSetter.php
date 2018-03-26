<?php

namespace App\Middleware;

use Slim\Http\Request as Request;
use Noodlehaus\Config;

class LanguageSetter
{

    protected $request;
    protected $config;

    public function __construct(Request $request, Config $config)
    {
      
        $this->request = $request;
        $this->config = $config;

      
        
    }

    public function __invoke($request, $response, $next)
    {


        // $route = $request->getAttribute('route');

       

        return $next($request, $response);
    }

}