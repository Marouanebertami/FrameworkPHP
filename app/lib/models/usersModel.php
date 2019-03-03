<?php


namespace MPHP\LIB\models;

use MPHP\lib\database\Database;

class UsersModel{
	
	public function listAll(){
		
		$data = new Database();
		
		$sql = "SELECT * FROM users";
		
		return $data->Query($sql);
		
	}
	
	public function insert($name, $email, $password){
		
		$data = new Database();
		
		$sql = "INSERT INTO users (Name, email, password) VALUES(?,?,?)";
		
		$values = [$name, $email, $password];
		
		return $data->executeSql($sql, $values);
		
	}
	
}