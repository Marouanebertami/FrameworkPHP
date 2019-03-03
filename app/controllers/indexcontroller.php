<?php

namespace MPHP\Controllers;


use MPHP\LIB\models\UsersModel;
use MPHP\conf\fields;


class IndexController extends AbstractController{
	
	public function defaultAction(){
		/*var_dump();*/
		$this->_data['test'] = UsersModel::listAll();
		
		$this->_view();
	}
	
	public function addAction(){
		/*$this->_view();*/
		$name = fields::postinput('name');
		/*$name = $_POST['name'];*/
		$password = md5(fields::typepassword('password'));
		
		if(fields::verifyemail('email')){
			var_dump(UsersModel::insert($name, $email, $password));
		
			header('Location: /');
		}else{
			echo 'enter good email';
		}
		
		/*var_dump($name, $email, $password);*/
		
	}
	
}