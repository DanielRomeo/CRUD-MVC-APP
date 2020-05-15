<?php
// if we wana change the dataabase in any way:: we do it here:

class Userscontroller extends Users {

	public function createUser($firstname, $lastname, $dob){
		$this->setUser($firstname, $lastname, $dob);
	}

	public function updateUser($id, $firstname, $lastname){
		$this->setUpdateUser($id, $firstname, $lastname);
	}
}