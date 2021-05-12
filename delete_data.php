<?php

	include 'inc_head.php';

	include_once('db.php');
$week = $_GET['curr'];
if ($week == 1)
{
$query = "delete from data where YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) and name = '".$_GET['name']."';";
}
else
{
$query = "delete from data where YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)+1 and name = '".$_GET['name']."';";
}

if ($mysqli->query($query)) {
	$result = "Successfully Cancelled";
}
else
{
	$result = "Failed to Cancel. Try Again";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Schedule</title>
  
	<style>
    <?php include "css/style.css" ?>
    <?php include "css/my.css" ?>
    </style>
	
	<script src="js/script.js" type="text/javascript"></script>
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

	<p class="red fancy">Your Schedule</p>

  <body>
<?php
if ($result)
{
echo "<br><br><h1>$result</h1>";
}
?>
  </body>
</html>
