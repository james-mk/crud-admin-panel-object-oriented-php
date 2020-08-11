<?php
class Database {
	
	private $host="localhost";
	private $user="root";
	private $pswd="";
	private $dbName="car";
	
	protected function connect() {
		$dsn= 'mysql:host='.$this->host.';dbname='.$this->dbName;
		$pdo= new PDO($dsn, $this->user, $this->pswd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		return $pdo;
	}
	
	
	
	
}
