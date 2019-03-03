<?php


namespace MPHP\lib\database;

class Database{
	
	private $db;
	
	public function __construct(){
		
		$this->db = new \PDO('mysql:host=localhost;dbname=FW','root','');
		
	}
	
	public function Query($sql, array $values = []){
		
		$query = $this->db->prepare($sql);
		
		$query->execute($values);
		
		$result = $query->fetchAll();
		
		return $result;
		
	}
	
	public function executeSql($sql, array $values = []){
		
		$query = $this->db->prepare($sql);
		
		$result = $query->execute($values);
		
		return $result;
		
	}
	
	public function QueryOne($sql, array $values = []){
		
		$query = $this->db->prepare($sql);
		
		$query->execute($values);
		
		$result = $query->fetch();
		
		return $result;
		
	}
	
}