<?php
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
$username = "newuser"; 
$password = "password"; 
$database = "csc350"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

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
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>Reserve</title>
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
			    <p class="red fancy">Reserve Your Slot</p>
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
if ($errName || $errPassword)
{
	echo "<br><br><h2>Failed. You MUST Fill Out All</h2>";
}
?>
    <?php echo "<br><br><h1>$result</h1>";?>	
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
