<?php

namespace MPHP\Controllers;

use MPHP\core\AbstractController;
use MPHP\LIB\models\UsersModel;
use MPHP\conf\fields;


class IndexController extends AbstractController{
	
	public function defaultAction(){
		
		$this->_data['test'] = UsersModel::listAll();
		
		$this->_view();
	}
	
	public function addAction(){
		
		$name = fields::postinput('name');
		
		$password = md5(fields::typepassword('password'));
		
		if(fields::verifyemail('email')){
			var_dump(UsersModel::insert($name, $email, $password));
		
			header('Location: /');
		}else{
			echo 'enter good email';
		}
		  
	}
	
}