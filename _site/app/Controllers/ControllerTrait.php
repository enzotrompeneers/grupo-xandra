<?php

namespace App\Controllers;

trait ControllerTrait
{



	protected function setLanguage($language)
	{

		$locales = $this->config->get('app');
		
		if ($language && !in_array($language, $locales['locales'])) {

			define('LANGUAGE', $locales['default_locale']);

			return false;

		}

		$language = ($language)	? $language : $locales['default_locale'];
		define('LANGUAGE', $language);

		return true;

	}

	protected function viewExists($view)
	{

		$path = __DIR__ . '/../../resources/views/';

		if (file_exists($path . $view . '.twig')) {

			return true;

		}

	}

}