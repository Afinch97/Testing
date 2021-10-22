<?php
require 'inc/header.php';
$leaderBoard = file_get_contents('Leaderboard.json');
$scores = json_decode($leaderBoard, true);
arsort($scores);
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
	  background-image: url('images/oldTv.jpg');
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
    table{
      margin-left: auto;
      margin-right: auto;
      table-layout: fixed;
      width: 300px;
      border-collapse: collapse;
    }
    th {
      background-color: #4C85BE;
      color: black;

    }
    th, td {
    border-bottom: 1px solid #000000;
    padding: 8px;
  }
    tr:nth-child(even) {background-color: #d07be3;}
</style>

<div class="main-container" id="overlay">
<h2 class="header">TV Phrase Hunter</h2>
<h3 class="header" color="black">Leaderboard</h3>
<?php
function printTable($arr){
  $html = '<table>';
  $html .= '<tr>';
  $html .= '<th>'.'Username'.'</th>';
  $html .= '<th>'.'Score'.'</th>';
  $html .= '</tr>';
    foreach( $arr as $key=>$value){
      $html .= '<tr>';
      $html .= '<td>'.$key." ".'</td>';
      $html .= '<td>'.$value.'</td>';
      $html .= '</tr>';
    }
  $html .= '</table>';
  echo $html;
}
printTable($scores);
?>
<br>
<form action="index.php" method="POST">
				<input type="submit" name="logout" id="logoutBtn" value="Go Home">
			</form>
<br>
