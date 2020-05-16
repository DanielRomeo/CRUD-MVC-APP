<?php
// session code:
// header('Content-type: application/json');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


	include_once('classes/views/usersview.class.php');
	include_once('classes/controllers/userscontroller.class.php');
?>

<?php
	// if(isset($_POST['submit'])){

	// 	// get the valuse from fields:
	// 	$firstname 		= $_POST['firstname'];
	// 	$lastname 		= $_POST['lastname'];
	// 	$dob 			= $_POST['dob'];
	// 	$language 		= $_POST['language'];

	// 	$newUser = "";
	// 	$newUser = new UsersController();
	// 	$newUser->createUser($firstname, $lastname, $dob, $language);
	// }

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$newUser = "";
		$newUser = new UsersController();
		$newUser->removeUser($id);
	}

	if(isset($_POST['action']) ){
		//echo "rasdfsdfsdfsdfsdfsdn";

		$newUser = "";
		$newUser = new UsersView();

		//echo $language =  $_POST['action'];
		echo $language;
		echo $newUser->showNumberOfUsersPerLanguage($language);
	}

	if(isset($_POST['search'])){
		
		$text = $_POST['search'];
		echo "workded";
	

		$newSearch = "";
		$newSearch = new UsersView();
		$newSearch->search($text);
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
					<canvas id="myChart"></canvas>
				  </div>
				</div>
			</div>
		</div> <!-- end of row -->

		<hr/>
		<!-- search row -->
		<div class="row">
			<div class="col-md-6">
				<div class="input-group mb-3">
					<form id="myform" name="myform" class="">
						<div class="input-group mb-3">

							<input name="search_text" id="search_text" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">

							<button type="submit" name="" class="btn btn-outline-secondary" type="button">Search</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
			
		</div>



		<div id="resultOriginal" class="row">
			<?php
			$testObj = new UsersView();
				$testObj->showAllUsers();
			?>
		</div>

		<div id="result" class="row">
			
		</div>
	</div>

	<!-- modal: -->
	

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    <script type="text/javascript">
    	$(document).ready(function(){


    		
			//search:
			$('#myform').on('submit', (function(e){
				e.preventDefault();
				console.log("keyup");
				var txt = $('#search_text').val();
				if(txt == ''){

				}else{
					$('#resultOriginal').html('');
					$('#result').html('');
					$.ajax({
						url: "index.php",
						method: "post",
						data: {search:txt},
						dataType: "text",
						success: function(data){
							$('#result').html(data);
						}
					});
				}
			}));


    		// make a post request to the views conttroller to get the languages data back:
    		var myValues = [];
    		//var AfrikaansData = getLanguageData('Afrikaans');
    		//getLanguageData('Afrikaans');
    		// var EnglishData = getLanguageData('English');
    		// var SepediData = getLanguageData('Sepedi');
    		// var ZuluData = getLanguageData('Zulu');


    		// get afrikaans data:
    		function getLanguageData(language){
    			//console.log("rrrrrran")
    			$.ajax({
    				
				    type: 'POST',  
				    data: { action: language }, 
				    contentType: "application/json",
					dataType: "json",
				    success: function (data) {
				        //myValues.push(data);
				        console.log(data)
				        myValues.push(data);
				    }
				});
				// console.log(myValues);

    		}
    		console.log(myValues);
    		

	    	var ctx = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx, {
			    type: 'bar',

			    data: {
			        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			        datasets: [{
			            label: 'My First dataset',
			            backgroundColor: 'rgb(255, 99, 132)',
			            borderColor: 'rgb(255, 99, 132)',
			            data: [0, 10, 5, 2, 20, 30, 45]
			        }]
			    },

			    options: {}
			});
    	});

    	 if ( window.history.replaceState ) {
		        window.history.replaceState( null, null, window.location.href );
		    }
    	
    </script>

</body>
</html>