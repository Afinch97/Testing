<?php
session_start();
$leaderBoard = file_get_contents('Leaderboard.json');
$scores = json_decode($leaderBoard, true);
$uname=$_SESSION['UserData']['Username'];
if (isset($_POST['start'])) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
}

if (isset($_SESSION['selected']) && isset($_POST['key'])) {
    $_SESSION['selected'][] = $_POST['key'];
} else {
    $_SESSION['selected'] = [];
}

include 'inc/Phrase2.php';
include 'inc/Game0.php';

if (isset($_SESSION['phrase'])) {
	$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
} else {
	$phrase = new Phrase();
	$_SESSION['phrase'] = $phrase->currentPhrase;
  $_SESSION['clue'] = $phrase->new;
}
$game = new Game($phrase);
require 'inc/header.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap');
	h2 {
	  font-family: 'Baloo Bhai', cursive;
	  font-size: 6rem;
	  text-shadow: 2px 2px 4px #000;
    }
    .header {
      color: #4C85BE;
    }
    body {
    background-image: url('images/background.jpg');
	  background-position: center;
    background-size: cover;

	}
    .correct {
      background: var(--color-win);
      border-radius: 5px;
      font-size: var(--font-size-medium);
      color: #FFFFFF;
    }
    .incorrect {
      background: var(--color-lose);
      color: #FFFFFF;
    }
    button {
      box-shadow: 0 8px 0 0 #000;
    }
    button:active {
      box-shadow: none;
      top: 8px;
      margin-bottom: 0;
    }
</style>



<div class="main-container" id="overlay">
<h2 class="header animated infinite pulse slower">Hangman</h2>
<h3 class="header" style="color:black;font-size: 30px;">Clue: <?php echo $_SESSION['clue'];?> </h3>
<?php if ($game->checkForLose() == true){ ?>
    <style>
        body {
          background: linear-gradient(15deg, #f5785f 50%, 	#FF0000 50.1%);
          width: 100%;
          height: 100%;
          z-index: 1;
        }
        .header {
          color: white;
        }
        input[type=submit] {
	      box-shadow: 4px 4px 8px #000;
	}
    </style>
    <?php echo $game->gameOver();
    } else if ($game->checkForWin() == true) { ?>
        <style>
            body {
              background: linear-gradient(15deg, #78CF82 50%, #008000 50.1%);
              width: 100%;
              height: 100%;
              z-index: 1;
            }
            .header {
              color: white;
            }
            input[type=submit] {
	          box-shadow: 4px 4px 8px #000;
	}
        </style>
    <?php
    $scores[$uname]++;
    $up = json_encode($scores);
		file_put_contents('Leaderboard.json',$up);
    echo $game->gameOver();
    } else { ?>
    <div id="phrase" class="section">
        <ul>
            <?php echo $phrase->addPhraseToDisplay(); ?>
        </ul>
    </div>
    <?php echo $game->displayKeyboard(); ?>
    <div id="scoreboard" class="section">
        <ol>
            <?php echo $game->displayScore(); ?>
        </ol>
    </div>
    <?php } ?>
</div>

<?php

require 'inc/footer.php';
