<?php
	include 'inc_head.php';
if (isset($_POST["submit"])) {
	$input_name = $_POST['name'];
	$input_pw   = $_POST['password'];	

	// Check if name has been entered
	if (!$_POST['name']) {
		$errName = 'Please enter your name';
	}

	if (!$_POST['password']) {
		$errPassword = 'Please enter your password for this week';
	}

if (!$errName && !$errPassword) {
	include_once('db.php');

$user_apt_by_db = '';
$isUser = false;
$query = "SELECT * FROM users;";
if ($query_result = $mysqli->query($query)){
    while ($row = $query_result->fetch_assoc()) {
	$apt  = $row['apt'];
	$name = $row['name'];
        $pw   = $row['password'];	
	
	if ($name == $input_name && $pw == $input_pw)
	{
	    $user_apt_by_db = $apt;
	    $isUser = true;
	    break;
	}
    }
}

if ($isUser){

//IMPORTANT, It tells if it's current week or next week. If it's current, it'll be 1, otherwise 0.
$current = $_GET['current'];

$isTimeBooked = false;
$found = false;	
$query = '';

if ($current){
	$query = "SELECT * FROM data WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1);";
}else
{
	$query = "SELECT * FROM data WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) + 1;";
}

if ($query_result = $mysqli->query($query)) {
    while ($row = $query_result->fetch_assoc()) {
	$date = $row['date'];
	$time = $row['time'];
	$apt  = $row['apt'];
	$name = $row['name'];
	
	if ($time == $_GET["time"])
	{
	    $isTimeBooked = true;
	    break;
	}
	if ($name == $input_name)
	{
            $found = true;
	    break;
	}
    }
    $query_result->free();

    if ($isTimeBooked)
    {
	$result = "The schedule you choose has been already reserved.";
    }

    if ($found)
    {
	$result = 'Process failed. You already have reserved.';
    }
    else
    {
	$time2 = $_GET['time'];
	
	if ($current){
		$query = "insert into data (date, time, apt, name) values (CURDATE(), $time2, '$user_apt_by_db', '$input_name');";
	}else{
		$query = "insert into data (date, time, apt, name) values (DATE_ADD(CURDATE(), INTERVAL 7 DAY), $time2, '$user_apt_by_db', '$input_name');";
	}

	
	if ($query_result = $mysqli->query($query)) {
	
	}else{
		echo "Update error\n";
	}
	
	

	$result = 'You successfully have reserved!';
    }
}
}
else{
    $result = "Incorrect Username or Password";
}


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
    <title>Reserve</title>
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

	<p class="red fancy">Reserve Your Slot</p>

  <body>

<?php 
if ($errName || $errPassword)
{
	echo "<br><br><h2>Failed. You MUST Fill Out All</h2>";
}
?>
    <?php echo "<br><br><h1>$result</h1>";?>	
    
  </body>
</html>
