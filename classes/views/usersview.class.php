<?php

include($_SERVER['DOCUMENT_ROOT']."/oop/app2/classes/models/users.class.php");


class UsersView extends Users{

	public function showUser($firstname){

		$results = $this->getUser($firstname);
		//echo json_encode($results);
		//echo var_dump($results);
		echo "Full name: ".$results[0]['firstname']. ' '.$results[0]['lastname'];
	}


	public function showNumberOfUsersPerLanguage($language){
		$results = $this->getUsersOfLanguage($language);

	}

	//search function:
	
	public function search($data){
		$results = $this->filterBySearch($data);

		if(sizeof($results) == 0){
			$results = "No data found that matches your query!";
			$output = "";
			echo $output;
		}else{
			$output = "";
		$output  .="
			<table class='table table-dark'>
				<thead>
				<tr>
					<th width='20%'>ID</th>
					<th width='20%'>FIRSTNAME</th>
					<th width='20%'>LASTNAME</th>
					<th width='20%'>HOME_LANGUAGE</th>
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
					<td>".$row['language']."</td>
					<td> 
						<button data-target='#editModal".$row['id']."' data-toggle='modal' type='button' class='btn btn-warning'>Edit</button>
					</td>

					<td> 
						<form action='".$_SERVER['PHP_SELF']."' method='POST'>
							<input name='id' hidden value='".$row['id']."'/>
							<button name='delete' type='submit' class='btn btn-danger'> Delete </button> </form>
						</form>	
					</td>			
				</tr>

				<div class='modal fade' id='editModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='editModal' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
						  <div class='modal-header'>
						    <h5 class='modal-title' id='editModal'>Edit User</h5>
						    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						      <span aria-hidden='true'>&times;</span>
						    </button>
						  </div>
						  <div class='modal-body'>

						  		<div class='container'>
							  		<div id='row'>

										<form action='index.php' method='POST'>

											<div class='form-group'>
												<label for=''>First name:</label>
												<input value='".$row['firstname']."' name='firstname' type='text' class='form-control' id='' required>
											</div>

											<div class='form-group'>
												<label for=''>Last Name:</label>
												<input value='".$row['lastname']."' name='lastname' type='text' class='form-control' required>
											</div>

											<div class='form-group'>
												<label for=''>Date Of Birth:</label>
												<input value='".$row['dob']."' name='dob' type='text' class='form-control' placeholder='eg. 2020-04-20' required>
											</div>

											<div class='form-group'>
												<label for=''>Home Language:</label>
												<select name='language' class='form-control' required>
													<option value='English'>English</option>
													<option value='Sepedi'>Sepedi</option>
													<option value='Zulu'>isiZulu</option>
													<option value='Afrikaans'>Afrikaans</option>
												</select>
											</div>

											<button id='submitButton' type='submit' name='submit' class='btn btn-primary'>Submit</button>
										</form>
									</div>
								</div>	
						  	</div>

						  	
						</div>
						</div>
					</div>"
				;
			}

		}

		echo $output;
	} // end of search function


	// this function shows all users along with a modal attached at the end for editing the records
	public function showAllUsers(){
		$results = $this->getUsers();
		//echo json_encode($results);
		$output = "";
		$output  .="
			<table class='table table-dark'>
				<thead>
				<tr>
					<th width='20%'>ID</th>
					<th width='20%'>FIRSTNAME</th>
					<th width='20%'>LASTNAME</th>
					<th width='20%'>HOME_LANGUAGE</th>
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
					<td>".$row['language']."</td>
					<td> 
						<button data-target='#editModal".$row['id']."' data-toggle='modal' type='button' class='btn btn-warning'>Edit</button>
					</td>

					<td> 
						<form action='".$_SERVER['PHP_SELF']."' method='POST'>
							<input name='id' hidden value='".$row['id']."'/>
							<button name='delete' type='submit' class='btn btn-danger'> Delete </button> </form>
						</form>	
					</td>			
				</tr>

				<div class='modal fade' id='editModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='editModal' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
						  <div class='modal-header'>
						    <h5 class='modal-title' id='editModal'>Edit User</h5>
						    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						      <span aria-hidden='true'>&times;</span>
						    </button>
						  </div>
						  <div class='modal-body'>

						  		<div class='container'>
							  		<div id='row'>

										<form action='index.php' method='POST'>

											<div class='form-group'>
												<label for=''>First name:</label>
												<input value='".$row['firstname']."' name='firstname' type='text' class='form-control' id='' required>
											</div>

											<div class='form-group'>
												<label for=''>Last Name:</label>
												<input value='".$row['lastname']."' name='lastname' type='text' class='form-control' required>
											</div>

											<div class='form-group'>
												<label for=''>Date Of Birth:</label>
												<input value='".$row['dob']."' name='dob' type='text' class='form-control' placeholder='eg. 2020-04-20' required>
											</div>

											<div class='form-group'>
												<label for=''>Home Language:</label>
												<select name='language' class='form-control' required>
													<option value='English'>English</option>
													<option value='Sepedi'>Sepedi</option>
													<option value='Zulu'>isiZulu</option>
													<option value='Afrikaans'>Afrikaans</option>
												</select>
											</div>

											<button id='submitButton' type='submit' name='submit' class='btn btn-primary'>Submit</button>
										</form>
									</div>
								</div>	
						  	</div>

						  	
						</div>
						</div>
					</div>"
			;
		}
		
		
		$output .= "</tbody> </table>";
		echo $output;
	}
}