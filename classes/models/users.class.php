<?php
include($_SERVER['DOCUMENT_ROOT']."/oop/app2/classes/config/db.php");


class Users extends DB{

	protected function getUser($firstname){
		$sql = "SELECT * FROM users WHERE firstname = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname]);
		$results = $stmt->fetchAll();

		// get info and pass to view
		return $results;
	}

	// get all uses:
	protected function getUsers(){
		$sql = "SELECT * FROM users";
		$stmt = $this->connect()->query($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		//echo json_encode($results);
		return $results;
	}

	// create:
	protected function setUser($firstname, $lastname, $dob, $language){
		$sql = "INSERT INTO users(firstname, lastname, dob, language) VALUES(?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname, $lastname, $dob, $language]);
		echo "User created";
	}

	protected function setUpdateUser($id, $firstname, $lastname, $dob, $language){
		$sql = "UPDATE users SET firstname=?, lastname=?, dob=?, language=? WHERE id=? " ;
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname, $lastname, $dob, $language, $id]);
		echo "User updated";
	}


}