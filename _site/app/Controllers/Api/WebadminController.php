<?php

namespace App\Controllers\Api;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig as View;
use Slim\Router;

use App\Controllers\ApiController;
use Brunelencantado\Xandra\PaginaHandler;

class WebadminController extends ApiController
{	


	public function index(Response $response, View $view, $language)
	{
		
		$data = [];
		$data['language'] = $language;

		$page = new PaginaHandler($this->db, $language);
		$data['list'] = $page->getList();

		$view->render($response, 'webadmin.twig', $data);
		
	}

	public function create(Request $request, Response $response, Router $router, $language)
	{
		$page = new PaginaHandler($this->db, $language);
		$input = $request->getParsedBody();

		$data = [];
		$data['language'] = $language;

		$insert = [];
		$insert['dominio'] = $input['dominio'];
		$insert['titulo_nl'] = $input['titulo'];
		$insert['h1_nl'] =  $input['h1'];
		$insert['subtitulo_nl'] =  $input['subtitulo'];
		$insert['cita_sandra_nl'] =  $input['cita_sandra'];
		$insert['texto_nl'] =  $input['texto'];
		$insert['url_nl'] =  $input['url'];
		$insert['titulo_presupuesto_nl'] =  $input['titulo_presupuesto'];
		$insert['meta_descr_nl'] =  $input['meta_descr'];
		$insert['meta_key_nl'] = $input['meta_key'];
		$insert['fecha_creado'] = date('Y-m-d');

		$this->db->insertQuery($insert, XNAME.'_paginas');

        return $response->withRedirect($router->pathFor('webadmin.default', [ 'language' => $language ]));
		
	}

	public function edit(Response $response, View $view, $language, $id)
	{
		$data = [];
		$data['language'] = $language;
		
		$page = new PaginaHandler($this->db, $language);
		$data['list'] = $page->getList();
		$data['edit'] = $page->getDetails($id);

		//dump($data['edit']);

		$view->render($response, 'webadmin.twig', $data);
	}

	public function update(Request $request, Response $response, Router $router, $language, $id)
	{
		
		$data = [];
		$data['language'] = $language;

		$page = new PaginaHandler($this->db, $language);
		$input = $request->getParsedBody();
		

		$update = [];
		$update['dominio'] = $input['dominio'];
		$update['titulo_nl'] = $input['titulo'];
		$update['h1_nl'] = $input['h1'];
		$update['subtitulo_nl'] = $input['subtitulo'];
		$update['cita_sandra_nl'] = $input['cita_sandra'];
		$update['texto_nl'] = $input['texto'];
		$update['url_nl'] = $input['url'];
		$update['titulo_presupuesto_nl'] = $input['titulo_presupuesto'];
		$update['meta_descr_nl'] = $input['meta_descr'];
		$update['meta_key_nl'] = $input['meta_key'];
		$update['fecha_creado'] = date('Y-m-d');

		$this->db->updateQuery($update, XNAME.'_paginas', [ 'id' => $id ]);

        return $response->withRedirect($router->pathFor('webadmin.default', [ 'language' => $language ]));
		
	}

	public function delete(Response $response, Router $router, $language, $id)
	{

		return $response->withRedirect($router->pathFor('webadmin.default', [ 'language' => $language ]));

	}
	

	
}


// End file