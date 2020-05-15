<?php 

class DB {
	private $server = "localhost";
	private $username = "root";
	private $password = "5308danielromeo";
	private $database = "oopDatabase";

	protected function connect(){
		$dsn = 'mysql:host=' .$this->server. ';dbname='. $this->database;
		$pdo = new PDO($dsn, $this->username, $this->password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;
	}
}

?>