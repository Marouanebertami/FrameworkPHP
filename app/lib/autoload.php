<?php

namespace MPHP\LIB;

class AutoLoad{
	public static function autoload($className){
		
		$className = str_replace('MPHP', '', $className);
		$className = str_replace('\\', '\\', $className);
		$className = strtolower($className);
		$className = $className . '.php';
		
		
		if(!file_exists(APP_PATH . DS . $className)){
			return;
		}
		
		require_once APP_PATH . DS . $className;
	}
}

spl_autoload_register(__NAMESPACE__ . '\AutoLoad::autoload');

