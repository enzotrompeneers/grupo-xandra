<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Noodlehaus\Config;

use Brunelencantado\Database\MySqliDatabase as Db;
use Brunelencantado\Content\Translator;


abstract class ApiController
{

	use ControllerTrait;

	protected $config;
	protected $db;
	protected $translator;

	protected $name;
	protected $view;
	protected $data;

	public function __construct(DB $db, Translator $translator, Config $config)
	{

		$this->config = $config;
		$this->db = $db;
		$this->translator = $translator;
		
	}

	public function getName()
	{

		return $this->name;

	}

	public function getView()
	{

		return $this->view;

	}

	public function getData()
	{

		return $this->data;

	}

	
}


// End file