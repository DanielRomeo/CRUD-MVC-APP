<?php

	include_once('classes/views/usersview.class.php');
	include_once('classes/controllers/userscontroller.class.php');
?>

<?php
	if(isset($_POST['submit'])){

		// get the valuse from fields:
		$firstname 		= $_POST['firstname'];
		$lastname 		= $_POST['lastname'];
		$dob 			= $_POST['dob'];
		$language 		= $_POST['language'];

		$newUser = "";
		$newUser = new UsersController();
		$newUser->createUser($firstname, $lastname, $dob, $language);
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Simple MVC application.</title>
</head>
<body>

	<div class="container">

		<br />
		<div class="row">
			<div class="col-md-6">
				<div id="insertCard" class="card text-white bg-dark mb-3" >
				  <div class="card-body">
				    <h5 class="card-title">Insert User</h5>
				    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
				    
				    <form action="index.php" method="POST">
				    	<div class="form-group">
						    <label for="">First name:</label>
						    <input name="firstname" type="text" class="form-control" id="" required>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputPassword1">Last Name:</label>
						    <input name="lastname" type="text" class="form-control" required>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputPassword1">Date Of Birth:</label>
						    <input name="dob" type="text" class="form-control" placeholder="eg. 2020-04-20" required>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputPassword1">Home Language:</label>
						    <select name="language" class="form-control" required>
						    	<option value="English">English</option>
						    	<option value="Sepedi">Sepedi</option>
						    	<option value="Zulu">isiZulu</option>
						    	<option value="Afrikaans">Afrikaans</option>
						    </select>
						  </div>
						 
						  <button id="submitButton" type="submit" name="submit" class="btn btn-primary">Submit</button>
				    </form>
				    
				    
				  </div>
				</div>
			</div> <!-- end of column-->

			<div class="col-md-6">
				<div id="statsCard" class="card border-primary mb-3" >
				  <div class="card-body text-primary">
				    <h5 class="card-title">Show Statistics</h5>
				    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
				
				  </div>
				</div>
			</div>
		</div> <!-- end of row -->

	





		<div class="row">
			<?php

				$testObj = new Usersview();
				//$testObj->getUsers();

				//$testObj->getUsersStmt('daniel', 'mamphekgo');
				//$testObj->showUser('daniel');

				//$testObj2 = new UsersController();
				//$testObj2->createUser('lincoln', 'seemola', '1997-04-30');

				//$testObj3 = new UsersController();
				//$testObj3->updateUser('1', 'katlego', 'mashabela');
				$testObj->showAllUsers();
			?>
		</div>
	</div>

	<!-- modal: -->
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>