<?php
 include 'inc_head.php';
?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Logout Page</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        body {
            background-color: #303641;
        }
    </style>
  </head>
  <body>
	<div id="container-login">
		<br>
	    <?php
	      if ( isset($_SESSION['username'])) {
	        session_destroy();
	        echo '<h1>Good to Go</h1>';
	      } else {
	        echo '<h1>You Are Not Logged In</h1>';
	      }
	    ?>
		<br>
		<br>
		<form action="login">
			<input type="submit" value="Go Back" />
		</form>
	</div>
</body>
</html>
