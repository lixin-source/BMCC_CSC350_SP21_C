<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry Booking</title>

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
    <link rel="stylesheet" href="css/style.css">

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
$query = "SELECT * FROM schedule WHERE  YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1
);";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $date    = $row["date"];
        $first   = $row["first"] ? Reserved : Available;
        $second  = $row["second"] ? Reserved : Available;
        $third   = $row["third"] ? Reserved : Available;
        $fourth  = $row["fourth"] ? Reserved : Available;
        $fifth   = $row["fifth"] ? Reserved : Available; 
        $sixth   = $row["sixth"] ? Reserved : Available;
        $seventh = $row["seventh"] ? Reserved : Available;
        $eighth  = $row["eighth"] ? Reserved : Available;

        echo '<tr> 
                  <td>'.$date.'</td> 
                  <td>	<a href="http://example.com">'.$first.'</a></td> 
                  <td>	<a href="http://example.com">'.$second.'</a></td> 
                  <td>	<a href="http://example.com">'.$third.'</a></td> 
                  <td>	<a href="http://example.com">'.$fourth.'</a></td> 
                  <td>	<a href="http://example.com">'.$fifth.'</a></td> 
                  <td>	<a href="http://example.com">'.$sixth.'</a></td> 
                  <td>	<a href="http://example.com">'.$seventh.'</a></td> 
                  <td>	<a href="http://example.com">'.$eighth.'</a></td> 
              </tr>';
    }
    $result->free();
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
			    <p>Current Week</p>
                        </div>
                        <div class="col-md-9 col-sm-10 nav_area">
                            <nav class="main_menu">
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="current.php">This Week</a></li>
                                        <li><a href="next.php">Next Week</a></li>
                                        <li><a href="Reservation.html">Reservation</a></li>
                                        <li><a href="Location&ContactUs.html">Contact</a></li>
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
