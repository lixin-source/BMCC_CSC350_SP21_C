<?php
session_start();
$isUser = false;

if (isset($_POST["submit"])) {
	$input_name = $_POST['username'];
	$input_pw   = $_POST['password'];	

	if (!$_POST['username']) {
		$errName = 'Please enter your name';
	}
	if (!$_POST['password']) {
		$errPassword = 'Please enter your password for this week';
	}

	if (!$errName && !$errPassword) 
	{
		include_once('db.php');

		$query = "SELECT * FROM users;";
		if ($query_result = $mysqli->query($query)){
			while ($row = $query_result->fetch_assoc()) {
				$name = $row['name'];
				$pw   = $row['password'];	

				if ($name == $input_name && $pw == $input_pw)
				{
					session_start();	
					$_SESSION['username'] = $_POST['username']; 
					header("Location: current.php");

					$isUser = true;
					break;
				}
			}
		}
	}
	if (!$isUser)
	{
		header("Location: login.php");
	}
}

?>

<!DOCTYPE html>
<html>
<body>


 </body>
</html>

