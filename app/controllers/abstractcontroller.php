<?php

namespace MPHP\Controllers;

use MPHP\LIB\FrontController;

class AbstractController{
	
	protected $_controllers;
	protected $_actions;
	protected $_params;
	
	protected $_data = [];
	
	public function notFoundAction(){
		$this->_view();
	}
	
	public function setController($ControllerName){
		
		$this->_controllers = $ControllerName;
		
	}
	
	public function setAction($actionName){
		
		$this->_actions = $actionName;
		
	}
	
	public function setParams($params){
		
		$this->_params = $params;
		
	}
	
	protected function _view(){
		extract($this->_data);
		if($this->_actions == FrontController::NOT_FOUND_ACTION){
			require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
		}else{
			$view = VIEWS_PATH . $this->_controllers . DS . $this->_actions . '.view.php';
			// echo $view;
			if(file_exists($view)){
				require_once $view;
			}else{
				require_once VIEWS_PATH . 'notfound' . DS . 'notview.view.php';
			}
		}
		
	}
	
}