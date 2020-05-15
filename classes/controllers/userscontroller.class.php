<?php
// if we wana change the dataabase in any way:: we do it here:

class Userscontroller extends Users {

	public function createUser($firstname, $lastname, $dob, $language){
		$this->setUser($firstname, $lastname, $dob, $language);
	}

	public function updateUser($id, $firstname, $lastname, $dob, $language){
		$this->setUpdateUser($id, $firstname, $lastname, $dob, $language);
	}
}