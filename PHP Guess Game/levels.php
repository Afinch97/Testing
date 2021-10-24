<?php
require 'inc/header.php';
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Level choice</title>
<style>
	@import url('https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap');
	h2 {
	  font-family: 'Baloo Bhai', cursive;
	  font-size: 2rem;
	  text-shadow: 4px 4px 8px #000;
		position: relative;
		top: -10rem;
	}
	.header {
      color: #4C85BE;
    }
	body {
		background-image: url('images/background.jpg');
	  background-size: cover;
		text-align: center;
		position: relative;

	}
	form{
		position: relative;
		top: -10rem;
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
<h2 class="header"style="font-size: 60px;">Choose your level</h2>
<h2 class="header"style="color:#ffffff; text-align: center;">The higher the level, the more difficult</h2>
<br>
<form action="play.php" method="POST" >
				<input type="submit" name="play" id="playBtn" value="Level 1">
			</form>
<form action="play2.php" method="POST">
      	<input type="submit" name="play" id="playBtn" value="Level 2">
      </form>
<form action="play3.php" method="POST">
      	<input type="submit" name="play" id="playBtn" value="Level 3">
      </form>
<form action="play4.php" method="POST">
      	<input type="submit" name="play" id="playBtn" value="Level 4">
      </form>
<br>

</div>
<br>

</body>
</html>
