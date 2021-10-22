<?php
require 'inc/header.php';
session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>logged in</title>
<style>
	
	h2 {
	  font-family: 'sans-serif';
	  font-size: 2rem;
	  text-shadow: 4px 4px 8px #000;
	}
	.header {
      color: #4C85BE;
    }
	body {
	  background-image: url('images/background.jpg');
	  background-size: cover;

	}

	input[type=submit] {
	  box-shadow: 4px 4px 8px #000;
	}
</style>
</head>
<body>
<div class="background"></div>
        <div class="background background2"></div>
        <div class="background background3"></div>
<div>
<h2 class="header">Congrats! You have logged into password protected page.</h2>
<br>
<form action="levels.php" method="POST">
				<input type="submit" name="play" id="playBtn" value="Choose Level">
			</form>
<form action="index.php" method="POST">
				<input type="submit" name="logout" id="logoutBtn" value="Log Out">
			</form>
<br>

</div>
<br>

</body>
</html>
