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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
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

	<p class="red fancy">Contact Us</p>

  <body>
  	<div class="container">
	<div class="container">
  <form action="">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="usa">USA</option>
      <option value="canada">Canada</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
  </body>
</html>
