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

	// count number of users that have the language:
	protected function getUsersOfLanguage($language){
		$sql = "SELECT count(*) as total FROM users WHERE language = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$language]);
		$results = $stmt->fetchAll();
		return $results;
	}

	// get users by search query:
	protected function filterBySearch($text){
		$sql = "SELECT * FROM users WHERE firstname LIKE '%dan%' ";
		$stmt = $this->connect()->query($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;
	}

	


	/*end of gets -----------------------------------------------------------------------------------*/



	// delete user
	protected function setDeleteUser($id){
		$sql = "DELETE FROM users WHERE id = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);

		echo "user has been deleted";
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