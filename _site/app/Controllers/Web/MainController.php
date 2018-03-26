<?php

namespace App\Controllers\Web;

use App\Controllers\ControllerTrait;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig as View;

use Brunelencantado\Database\MySqliDatabase as Db;
use Noodlehaus\Config;
use Brunelencantado\Content\Menu;
use Brunelencantado\Content\Page;
use Brunelencantado\Content\Translator;
use Brunelencantado\Mail\Mailer;

class MainController
{

	use ControllerTrait;

	protected $config;
	protected $db;
	protected $view;
	protected $page;
	protected $menu;
	protected $translator;

	protected $defaultView = 'content';
	protected $request;
	protected $response;

	public function __construct(Config $config, Db $db, View $view, Page $page, Menu $menu, Translator $translator, Mailer $mailer)
	{

		$this->config = $config;
		$this->db = $db;
		$this->view = $view;
		$this->page = $page;
		$this->menu = $menu;
		$this->translator = $translator;
		$this->mailer = $mailer;

	}

	public function index(Request $request, Response $response, $language = null, $slug = null)
	{

		$this->request = $request;
		$this->response = $response;

		// Inicial variables
		$status = 200;
		$set404 = false;
		$data 	= [];
		$view	= null;

		// Set language constant
		if (!$this->setLanguage($language, $response)) $set404 = true;
		$data['language'] = LANGUAGE;
		
		// Menu
		$menu = $this->menu;
		// $menu->setMenuData();
		$menu->setBaseUrl($request->getUri()->getBasePath());
		$data['menu'] = $menu;
		
		// Page
		$page = $this->page->getPageFromSlug($slug);
		$data['page'] = $page;

		// Get other controller, if exists, based on clave/slug
		$controller = $this->getController($page);
		
		if ($controller) {

			$controller->index();
			$view = $controller->getView();
			$data[$controller->getName()] = $controller;

		}
		if (!$controller && !$page->clave) $set404  = true;

		// 404 not found
		if ($set404) {

			$status = 404;
			$view = 'errors/404';

		}

		// Set view
		$view = ($view) ? $view : $page->clave;
		$view = ($this->viewExists($view)) ? $view : $this->defaultView;
		$view .= '.twig';
		
		// Render response
		$this->view->render($response, $view, $data);
		
		return $response->withStatus($status);
		
	}
	
	protected function getController(Page $page)
	{

		$name = ($page->clave) ? $page->clave : $page->slug;
		$controller = $this->getControllerName($name);

		if (class_exists($controller)){

			return new $controller($this->request, $this->response, $name, $this->db, $this->translator, $this->config);

		}

	}

	protected function getControllerName($string)
	{

		$controller = '';

		foreach (explode('-', $string) as $item){

			$controller .= ucfirst($item);

		}

		return '\App\Controllers\Web\\' . $controller . 'Controller';

	}
}

// End file