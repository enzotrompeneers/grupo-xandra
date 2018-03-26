<?php
/**
 * Config class
 *
 * Stores configuration data
 *
 * @author Daniel Beard <daniel@brunel-encantado.com>
 */
 
 namespace Brunelencantado;
 
 class Config
 {

	 protected static $config = array();
	 
	 public static function getParameter($name)
	 {
		
		if (isset(self::$config[$name])) return self::$config[$name];
		throw new \Exception('Does not exist: ' . $name);
	 }
	 public static function setParameter($name, $value)
	 {
		 self::$config[$name] = $value;
	 }
	 
 }
 
 
 
 
 
 // End of file