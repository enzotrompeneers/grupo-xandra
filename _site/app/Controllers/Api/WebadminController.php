<?php

namespace App\Controllers\Api;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig as View;


use App\Controllers\ApiController;


class WebadminController extends ApiController
{	


	public function index(Response $response, View $view, $language)
	{
		
		$data = [];
		$data['language'] = $language;

        $view->render($response, 'webadmin.twig', $data);
		
	}
	

	
}


// End file