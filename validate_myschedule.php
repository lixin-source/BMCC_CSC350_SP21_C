<?php
	include 'inc_head.php';
if (isset($_POST["submit"])) {
	$input_name = $_POST['name'];
	$input_pw   = $_POST['password'];	

	if (!$_POST['name']) {
		$errName = 'Please enter your name';
	}
	if (!$_POST['password']) {
		$errPassword = 'Please enter your password for this week';
	}
if (!$errName && !$errPassword) {

	include_once('db.php');

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
	$timeslots[0] = "00:00 ~ 03:00";
	$timeslots[1] = "03:00 ~ 06:00";
	$timeslots[2] = "06:00 ~ 09:00";
	$timeslots[3] = "09:00 ~ 12:00";
	$timeslots[4] = "12:00 ~ 15:00";
	$timeslots[5] = "15:00 ~ 18:00";
	$timeslots[6] = "18:00 ~ 21:00";
	$timeslots[7] = "21:00 ~ 24:00";
	

//This week

$thisWeekTime ='';
$isUserInWeek = false;
$query = "SELECT * FROM data where YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1);";
if ($query_result = $mysqli->query($query)){
    while ($row = $query_result->fetch_assoc()) {
	$time = $row['time'];
	$name = $row['name'];
	
	if ($name == $input_name)
	{
		$thisWeekTime = $time;
	    $isUserInWeek = true;
	    break;
	}
    }
}

if ($isUserInWeek){
	$day = $thisWeekTime / 8;
	$order = $thisWeekTime % 8;
	
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

	$dday = $monday + (86400  * $day);
	$dday= date("m-d-Y", $dday);
	$slot= $timeslots[$order];

}
//This week end

//Next week

$nextWeekTime ='';
$isUserInNextWeek = false;
$query = "SELECT * FROM data where YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) + 1;";
if ($query_result = $mysqli->query($query)){
    while ($row = $query_result->fetch_assoc()) {
	
	$name = $row['name'];
	$time = $row['time'];

	if ($name == $input_name)
	{
		$nextWeekTime = $time;
	    $isUserInNextWeek = true;
	    break;
	}
    }
}

if ($isUserInNextWeek){
	$day = $nextWeekTime / 8;
	$order = $nextWeekTime % 8;

	$next_monday = strtotime("monday");
	$next_monday = date('w', $next_monday)==date('w') ? $next_monday+7*86400 : $next_monday;

	$next_dday = $next_monday + (86400  * $day);
	$next_dday= date("m-d-Y", $next_dday);
	$next_slot= $timeslots[$order];

}

//Next week end
}else{
	$invalidUser = "There isn't such a user";	
}
}
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
if ($errName || $errPassword)
{
	echo "<br><br><h2>Failed. You MUST Fill Out All</h2>";
}

echo '<div class="container">
		<div class="row">
		<form id="myForm" action="delete_data.php" method="post">';

if ($isUserInWeek)
{

$str = strtoupper($input_name);
echo "<div class='col-lg-3'>
        <div class='card'>
          <div class='card-body'>
		    <br>
            <h5 class='card-title text-muted text-uppercase text-center'>This Week Schedule</h5>
            <hr>
            <ul class='fa-ul'>
              <li><span class='fa-li'><i class='fas fa-check'></i></span>$dday</li>
              <li><span class='fa-li'><i class='fas fa-check'></i></span>$slot</li>
            </ul>
            <a href='delete_data.php?curr=1&name=$input_name' id='cancel' class='btn btn-block btn-primary text-uppercase'>Cancel</a>
          </div>
        </div>
      </div>";
}

if ($isUserInNextWeek)
{
echo "<div class='col-lg-3'>
        <div class='card'>
          <div class='card-body'>
		    <br>
            <h5 class='card-title text-muted text-uppercase text-center'>Next Week Schedule</h5>
            <hr>
            <ul class='fa-ul'>
              <li><span class='fa-li'><i class='fas fa-check'></i></span>$next_dday</li>
              <li><span class='fa-li'><i class='fas fa-check'></i></span>$next_slot</li>
            </ul>
            <a href='delete_data.php?curr=0&name=$input_name' id='cancel' class='btn btn-block btn-primary text-uppercase'>Cancel</a>
          </div>
        </div>
      </div>";

}
echo '</form>
	</div>
  </div>';

if ($invalidUser)
{
echo "<br><br><h1>$invalidUser</h1>";
}
elseif (!$isUserInWeek && !$isUserInNextWeek){
	echo '<br><br><br><h1>You do not have any slots reserved.</h1>';
}
?>

  </body>
</html>
