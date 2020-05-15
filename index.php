<?php

	include_once('classes/views/usersview.class.php');
	include_once('classes/controllers/userscontroller.class.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple MVC application.</title>
</head>
<body>



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

</body>
</html>