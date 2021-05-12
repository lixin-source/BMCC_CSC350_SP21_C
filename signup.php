<?php
	include 'inc_head.php';
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
.popup {
position: relative;
display: inline-block;
cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
}

.popup .popuptext {
visibility: hidden;
width: 160px;
	   background-color: #555;
color: #fff;
	   text-align: center;
	   border-radius: 6px;
padding: 8px 0;
position: absolute;
		  z-index: 1;
bottom: 125%;
left: 50%;
	  margin-left: -80px;
}

.popup .popuptext::after {
content: "";
position: absolute;
top: 100%;
left: 50%;
	  margin-left: -5px;
	  border-width: 5px;
	  border-style: solid;
	  border-color: #555 transparent transparent transparent;
}

.popup .show {
visibility: visible;
			-webkit-animation: fadeIn 1s;
animation: fadeIn 1s;
}

@-webkit-keyframes fadeIn {
	from {opacity: 0;}
	to {opacity: 1;}
}

@keyframes fadeIn {
	from {opacity: 0;}
	to {opacity:1 ;}
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
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1 class="page-header text-center">Reservation</h1>
<form class="form-horizontal" role="form" method="post" action="validate.php?current=<?php echo $_GET["current"] ?>&time=<?php echo $_GET["time"] ?>">

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="name" name="name" placeholder="first & last name with all lowercase. EX) lionel messi" value="<?php echo htmlspecialchars($_POST['name']); ?>">
<?php echo "<p class='text-danger'>$errName</p>";?>
</div>
</div>
<div class="form-group">
<label for="aptno" class="col-sm-2 control-label">Password</label>
<div class="col-sm-10">
<input class="form-control" id="password" name="password" type="password" placeholder="">
<?php echo "<p class='text-danger'>$errPassword</p>";?>
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
</div>

<br><br><br><br><br><br>
<div class="popup" onclick="myFunction()">Click For a Test Account!
<span class="popuptext" id="myPopup">Name: jeff, PW: 0000 (DON'T CHANGE PW)</span>
</div>
</div>
</form> 
</div>
</div>
</div>   
<script>
// When the user clicks on div, open the popup
function myFunction() {
	var popup = document.getElementById("myPopup");
	popup.classList.toggle("show");
}
</script>
</body>
</html>
