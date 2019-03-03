<?php


namespace MPHP\conf;

class fields{
	
	public function postinput($element){
		return $_POST[$element];
	}
	
	public function getinput($element){
		return $_GET[$element];
	}
	
	public function typepassword($element){
		return md5($_POST[$element]);
	}
	
	public function verifyemail($element){
		$email = fields::postinput($element);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
		
		return false;
	}
}