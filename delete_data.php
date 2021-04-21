<?php
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
    </style>
	
	<script src="js/script.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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
			    <p class="red fancy">Your Schedule</p>
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
if ($result)
{
echo "<br><br><h1>$result</h1>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
