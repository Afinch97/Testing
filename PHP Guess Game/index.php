<?php

require 'inc/header.php';

?>
<style>
	
	h2 {
	  font-family: 'sans-serif';
	  font-size: 8rem;
	  text-shadow: 4px 4px 8px #000;
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

<div class="main-container animated bounceInDown">
	<h2 class="header">Hangman</h2>
	<form action="login.php" method="POST">
		<input id="btn__reset" type="submit" name="start" value="Log in/Register" />
	</form>
</div>

<?php

require 'inc/footer.php';

?>
