<?php
include 'inc_head.php';

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
if (!$errOld && !$errName && !$errNew) {
include_once('db.php');

$isUser = false;

$query = "select * from users;";
if ($query_result = $mysqli->query($query)){
    while ($row = $query_result->fetch_assoc()) {
	$name = $row['name'];
	$pw   = $row['password'];	
	
	if ($name == $input_name && strcmp((string)$pw, (string)$input_old_pw) == 0)
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

}else
{
	$invalidMsg = "There isn't such a user";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
    <?php include "css/style.css" ?>
    <?php include "css/my.css" ?>
    </style>
    <title>My Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <header>
    <nav class="navbar">
	<div class="navbar_logo">
	<a href="index"><img src="img/laundry.png" alt="Site Logo" width="50"
	height="50"></a>
	</div>

	<ul class="navbar_menu">
                                        <li><a href="current">THIS WEEK</a></li>
                                        <li><a href="next">NEXT WEEK</a></li>
                                        <li><a href="myschedule">MY SCHEDULE</a></li>
                                        <li><a href="myinfo">MY PAGE</a></li>
                                        <li><a href="Contact">CONTACT</a></li>
                                        <li><a href="logout">LOGOUT</a></li>
	</ul>

    </nav>
    </header>	

	<p class="red fancy">My Page</p>

  <body>


<?php 
if ($errName || $errPassword || $errWeek)
{
	echo "<br><br><h2>Failed. You MUST Fill Out All</h2>";
}

if ($invalidMsg)
{
	echo "<h1>$invalidMsg</h1><br><br><h1>Please Type a Correct Name or Password</h1>";
}
elseif ($result)
{
	echo "<br><br><h1>$result</h1><br>";
}
?>

  </body>
</html>
