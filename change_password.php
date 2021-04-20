<?php
if (isset($_POST["submit"])) {
	$input_name   = $_POST['name'];
	$input_old_pw = $_POST['old'];	
	$input_new_pw = $_POST['new'];	

	if (!$_POST['name']) {
		$errName = 'Please enter your name';
	}
	if (!$_POST['old']) {
		$errOld = 'Please enter your current password';
	}
	if (!$_POST['new']) {
		$errNew = 'Please enter your new password';
	}
	
if (!$errWeek && !$errName && !$errPassword) {
$username = "newuser"; 
$password = "password"; 
$database = "csc350"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$isUser = false;

$query = "select * from users;";
if ($query_result = $mysqli->query($query)){
    while ($row = $query_result->fetch_assoc()) {
	$name = $row['name'];
        $pw   = $row['password'];	
	
	if ($name == $input_name && $pw == $input_old_pw)
	{
	    $isUser = true;
	    break;
	}
    }
}
if ($isUser){

	$query = "update users set password = '$input_new_pw'  where name = '$input_name';";
	$mysqli->query($query);
	$result = "Successfully Changed!";
}else{
	$invalidMsg = "There isn't such a user";
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
    <?php include "css/style.css" ?>
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>My Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <style>
h1{
    color: Tomato;
    font-size: 4em;
    text-align: center;
}
h2
{
    color: Red;
    font-size: 4em;
    text-align: center;
}
    </style>
  </head>
    <header class="header_area" style="background-color: white;">
        <div class="header_bottom">
            <div class="container">
                <div class="main_header">
                    <div class="row">
                        <div class="col-md-3 col-sm-2">
                            <div class="logo">
                                <a href="index"><img src="img/laundry.png" alt="Site Logo" width="50"
                                        height="50"></a>
                            </div>
			    <p class="red fancy">My Page</p>
                        </div>
                        <div class="col-md-9 col-sm-10 nav_area">
                            <nav class="main_menu">
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index">Home</a></li>
                                        <li><a href="current">This Week</a></li>
                                        <li><a href="next">Next Week</a></li>
                                        <li><a href="myschedule">My Schedule</a></li>
                                        <li><a href="myinfo">My Page</a></li>
                                        <li><a href="Contact">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
  <body>

<?php 
if ($errName || $errPassword || $errWeek)
{
	echo "<br><br><h2>Failed. You MUST Fill Out All</h2>";
}
?>

<?php 
if ($invalidMsg)
{
	echo "<h1>$invalidMsg</h1><br><br><h1>Please Type a Correct Name or Password</h1>";
}
elseif ($result)
{
	echo "<br><br><h1>$result</h1><br>";
}
?>
    	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
