<?php

namespace MPHP\LIB;

class FrontController{
	
	const NOT_FOUND_ACTION = 'notfoundAction';
	const NOT_FOUND_CONTROLLER = 'MPHP\Controllers\\NotFoundController';
	
	private $_controllers = 'index';
	private $_actions = 'default';
	private $_params = array();
	
	public function __construct(){
		$this->_parseUrl();
	}
	
	private function _parseUrl(){
		$url = explode('/' , trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
		if(isset($url[0]) && $url[0] != ''){
			$this->_controllers = $url[0];
		}
		if(isset($url[1]) && $url[1] != ''){
			$this->_actions = $url[1];
		}
		if(isset($url[2]) && $url[2]){
			$this->_params = explode('/', $url[2]);
		}
		
		// return $this;
		// @list($this->_controllers, $this->_actions, $this->_params) = explode('/', trim($url, '/'), 3);

		// $this->_params = explode('/', $this->_params);

	}
	
	public function dispath(){
		
		$controllerClassName = 'MPHP\Controllers\\'.ucfirst($this->_controllers).'Controller';
		$actionName = $this->_actions.'Action';
		if(!class_exists($controllerClassName)){
			$controllerClassName = self::NOT_FOUND_CONTROLLER;
		}
		
		$controller = new $controllerClassName();
		if(!method_exists($controller, $actionName)){
			$this->_actions = $actionName = self::NOT_FOUND_ACTION;
		}
		$controller->setController($this->_controllers);
		$controller->setAction($this->_actions);
		$controller->setParams($this->_params);
		$controller->$actionName();
		
	}
	
}