<?php

include($_SERVER['DOCUMENT_ROOT']."/oop/app2/classes/models/users.class.php");

class UsersView extends Users{

	public function showUser($firstname){

		$results = $this->getUser($firstname);
		//echo json_encode($results);
		//echo var_dump($results);
		echo "Full name: ".$results[0]['firstname']. ' '.$results[0]['lastname'];
	}

	public function showAllUsers(){
		$results = $this->getUsers();
		//echo json_encode($results);
		$output = "";
		$output  .="
			<table >
				<tr>
					<th width='15%'>id</th>
					<th width='20%'>firstname</th>
					<th width='20%'>lastname</th>
					<th width='15%'>update</th>
					<th width='15%'>delete</th>
				</tr>
		";

		foreach ($results as $row) {
			$output .= "
			<tr>
				<td>".$row['id']."</td>
				<td>".$row['firstname']."</td>
				<td>".$row['lastname']."</td>
				<td> 
					<a class='btn btn-warning'>Edit</a>
				</td>

				<td> 
					<a class='btn btn-danger'>Delete</a>
				</td>			
			</tr>";
		}
		
		
		$output .= "</table>";
		echo $output;
	}
}