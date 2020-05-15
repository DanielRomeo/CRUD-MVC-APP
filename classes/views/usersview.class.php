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
			<table class='table table-dark'>
				<thead>
				<tr>
					<th width='15%'>ID</th>
					<th width='20%'>FIRSTNAME</th>
					<th width='20%'>LASTNAME</th>
					<th width='10%'>UPDATE</th>
					<th width='10%'>DELETE</th>
				</tr>
				</thead>
		";

		foreach ($results as $row) {
			$output .= "
			<tbody>
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
				</tr>"
			;
		}
		
		
		$output .= "</tbody> </table>";
		echo $output;
	}
}