<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laundry Booking</title>
<style>
<?php include "css/style.css" ?>
</style>
<!-- Google/Custom font -->
<link
href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic'
rel='stylesheet' type='text/css'>


<!-- Bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Font awesome css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">
<link rel="shortcut icon" type="image/png" href="img/favi-con.png" />
</head>

<body>

<?php
function SetTable()
{
$username = "newuser";
$password = "password";
$database = "csc350";
$mysqli = new mysqli("localhost", $username, $password, $database);


$arr;
$query = "SELECT * FROM data WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) + 1;";

if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
                $time = $row['time'];
                $arr[$time] = 1;
        }
}
$result->free();

$monday = strtotime("monday");
$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

for ($i = 0; $i < 56; $i++){
        if ($i % 8 == 0){
                $day = $monday + (86400  * ($i / 8));
                echo '<tr>
                        <td>' . date("m-d-Y", $day) . '</td>';
        }

        if (array_key_exists($i, $arr)){
                echo '<td>Reserved</td>';
        }else{
                echo '<td> <a href="signup.php?current=0&time='.$i.'">Available</a></td>';
        }

        if ($i % 8 == 7){
                echo '</tr>';
        }
}


}
?>

<header class="header_area" style="background-color: white;">
<div class="header_bottom">
<div class="container">
<div class="main_header">
<div class="row">
<div class="col-md-3 col-sm-2">
<div class="logo">
<a href="index.php"><img src="img/laundry.png" alt="Site Logo" width="50"
height="50"></a>
</div>
<p class="red fancy">Next Week</p>
</div>
<div class="col-md-9 col-sm-10 nav_area">
<nav class="main_menu">
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="index.php">Home</a></li>
<li><a href="current.php">This Week</a></li>
<li><a href="next.php">Next Week</a></li>
<li><a href="myschedule.php">My Schedule</a></li>
<li><a href="myinfo.php">My Page</a></li>
<li><a href="Contact.php">Contact</a></li>

</ul>
</div>
</nav>

</div>
</div>
</div>
</div>
</div>
</header>

<div class="container" id="schedule_table" style="background-color: white;padding:0;">
<table style="width:100%">
<tr>
<th>Date</th>
<th>00:00 - 03:00</th>
<th>03:00 - 06:00</th>
<th>06:00 - 09:00</th>
<th>09:00 - 12:00</th>
<th>12:00 - 15:00</th>
<th>15:00 - 18:00</th>
<th>18:00 - 21:00</th>
<th>21:00 - 24:00</th>
</tr>
<?php SetTable(); ?>

</table>
</div>
​​
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
