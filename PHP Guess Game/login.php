<?php session_start(); /* Starts the session */
require 'inc/header.php';
$accounts = file_get_contents('accounts.json');
$logins = json_decode($accounts, true);
$leaderBoard = file_get_contents('Leaderboard.json');
$scores = json_decode($leaderBoard, true);
	/* Check Login form submitted */
	if(isset($_POST['Register'])){
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

		$logins += [$Username => $Password];
		$scores += [$Username => 0];
		$up = json_encode($logins);
		file_put_contents('accounts.json',$up);
		$down = json_encode($scores);
		file_put_contents('Leaderboard.json',$down);
		$msg="<span style='color:green; font-size: 2rem; font-weight: 800;'>Registered! Please log in with your new info</span>";
	}
	if(isset($_POST['Submit'])){
		$accounts = file_get_contents('accounts.json');
		$logins = json_decode($accounts, true);
		/* Define username and associated password array */
		/* You can change username and associated password array to your pref*/

		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

		/* Check Username and Password existence in defined array */
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			print_r($_SESSION);
			$_SESSION['UserData']['Username']=$Username;
			header("location:index2.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red;font-size: 2rem;'>Invalid Login Details</span>";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Script Without Using Database</title>
<style>
	h2 {
		font-family: 'sans-serif';
	  font-size: 4rem;
	  text-shadow: 4px 4px 8px #000;
		text-align: center;
	}
	.header {
      color: #4C85BE;
    }
	body {
	  background-image: url('images/background.jpg');
	  background-size: cover;

	}
	form {
	  margin-top: -25rem;
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
<div id="Frame0">

</div>
<br>
<form action="" method="post" name="Login_Form" style="position: relative; top: -20rem;">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
		<br>
    <tr>
      <td colspan="2" align="left" vertical-align="top"><h2 class="header">Login/Register</h2></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
	<center cellspacing="0" cellpadding="2">
	<td><input name="Submit" type="submit" value="Login" class="Button3"></td>
	<td><input name="Register" type="submit" value="Register" class="Button3"></td>
</center>
</form>
</body>
</html>
<?php

require 'inc/footer.php';

?>
