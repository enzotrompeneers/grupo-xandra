<?php
// DIC configuration

use function DI\get;
use Noodlehaus\Config;
use Interop\Container\ContainerInterface;
use Slim\Interfaces\RouterInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Router;
use Brunelencantado\Content\Translator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Brunelencantado\Logger\LoggerWeb;
use Brunelencantado\Database\MySqliDatabase as Db;
use Brunelencantado\Content\Menu;
use Brunelencantado\Content\Page;
use Brunelencantado\Mail\Mailer;
use Brunelencantado\Storage\SessionStorage;

return [

	// Router
    'router' => get(Slim\Router::class),
	
	// Config
	Config::class => function (ContainerInterface $container) {

		return new \Noodlehaus\Config([
			
			'config/config.yaml',

		]);

	},
	
	// Database
	Db::class => function(ContainerInterface $container) {
		
		$dbConfig = $container->get(Config::class)->get('db');
		$mode = $dbConfig['mode'];
		
		define('XNAME', $dbConfig['xname']);

		$aConnectionData = [
		
			'hostname' => $dbConfig['mysql'][$mode]['hostname'],
			'database' => $dbConfig['mysql'][$mode]['database'],
			'username' => $dbConfig['mysql'][$mode]['username'],
			'password' => $dbConfig['mysql'][$mode]['password'],
		
		];
		
		return new Db($aConnectionData, $container->get(Loggerweb::class));
		
	},
	
	//Mailer
	Mailer::class => function(ContainerInterface $container) {

		$mailConfig = $container->get(Config::class)->get('mail');
		$mailConfig['default_from_name'] = 'BE Creativos';
		$mailConfig['default_from_address'] = 'daniel@creativos.be';

		$mail = new PHPMailer(true);   

		return new Mailer($mail, $container->get(Db::class), $mailConfig);

	},

	// Logger
	LoggerWeb::class => function() {
		
		return new Loggerweb;
		
	},
	
	// Menu
	Menu::class => function (ContainerInterface $container) {
		
		return new Menu($container->get(Db::class));
		
	},
	
	// Page
	Page::class => function (ContainerInterface $container) {
		
		return new Page($container->get(Db::class));
		
	},
		
	// Twig
    Twig::class => function (ContainerInterface $container) {

        $twig = new Twig(__DIR__ . '/../resources/views/', [
            'cache' => false
        ]);

        $twig->addExtension(new TwigExtension(
            $container->get('router'),
            $container->get('request')->getUri()
        ));
		
		$twig->addExtension(new App\Views\Extensions\TranslateExtension($container->get(Translator::class)));
		$twig->addExtension(new Twig_Extension_Debug());
		
		$twig['baseUrl'] = $container->get('request')->getUri()->getBaseUrl() . '/public';

        return $twig;
	},
	
	// Session control
	SessionStorage::class => function (ContainerInterface $container) {

		return new SessionStorage();

	},

	// Router
	Router::class => function() {

		return new Router();

	},
	
	
	Translator::class => function (ContainerInterface $container) {
		
		return new Translator($container->get(Db::class));
		
	},

	// 404 handler
	'notFoundHandler' => function (ContainerInterface $container) {
		
		return function ($request, $response) use ($container) {

			$container->get(Twig::class)->render($response, 'errors/404.twig');
			return $response->withStatus(404);
			
		};
		
	}
				
			

];
