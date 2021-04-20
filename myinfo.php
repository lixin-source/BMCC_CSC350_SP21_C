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

    <title>My Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
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
			    <p class="red fancy">My Page</p>
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
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Change Your Password</h1>
				<form class="form-horizontal" role="form" method="post" action="change_password.php">
			<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="first & last name with all lowercase. EX) lionel messi" value="<?php echo htmlspecialchars($_POST['name']); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="old" class="col-sm-2 control-label">Current Password</label>
						<div class="col-sm-10"> 
							<input type="text" class="form-control" id="old" name="old" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="new" class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10"> 
							<input type="text" class="form-control" id="new" name="new" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
