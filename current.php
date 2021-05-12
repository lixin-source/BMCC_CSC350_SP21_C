<?php
	include 'inc_head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry Booking</title>

    <style>
    <?php include "css/style.css" ?>
	<?php include "css/my.css" ?>
    </style>
</head>
<body>
<?php
function SetTable()
{
	include_once('db.php');


$arr;
$query = "SELECT * FROM data WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1);";

if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$time = $row['time'];
		$arr[$time] = 1;
	}
}
$result->free();

$monday = strtotime("last monday");
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
		echo '<td> <a href="signup.php?current=1&time='.$i.'">Available</a></td>';
	}

	if ($i % 8 == 7){
		echo '</tr>';	
	}
}


} 
?>
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

	<p class="red fancy">This Week</p>
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
    </body>
</html>
