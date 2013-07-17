<!DOCTYPE html>
<html>
<head>
	<title>Quiz Bowl Score Keeper</title>
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link href='http://fonts.googleapis.com/css?family=Comfortaa:700,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script>/*
	function Player() {
		var scoreArray = new Array();
		var totalPts = 0;
		var numPowers = 0;
		var numTU = 0;
		var numNegs = 0;
	}
	function Team() {
		var bonus = new Player();
		var player1 = new Player();
		var player2 = new Player();
		var player3 = new Player();
		var player4 = new Player();
		var playerArray = new Array(bonus, player1, player2, player3, player4);
		var score = 0;
		var ptsOffBonus = 0;	
	}
	function Game() {
		var team1 = new Team();
		var team2 = new Team();
		var teamArray = new Array(team1, team2);
		var curQuestion = 1;
	}

	var game  = new Game();*/
	var score = new Array();
	score[1] = 0;
	score[2] = 0;
 	</script>
</head>
<body>
	<div class="body">
		<div id="title">Score Keeper</div>
		<div class="team" id="team1">
			<h2><?php echo $_POST['team1']; ?></h2>
			<br />
			<div class="score">
				<p id="score1">0</p>
			</div>
			<div class="1-1 power">15</div>
			<div class="1-2 power">15</div>
			<div class="1-3 power">15</div>
			<div class="1-4 power">15</div>
			<div class="1-1 player">
				<?php $temp = $_POST['p11'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="1-2 player">
				<?php $temp = $_POST['p12'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="1-3 player">
				<?php $temp = $_POST['p13'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="1-4 player">
				<?php $temp = $_POST['p14'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="1-1 neg">-5</div>
			<div class="1-2 neg">-5</div>
			<div class="1-3 neg">-5</div>
			<div class="1-4 neg">-5</div>
			<div class="bonus hidden">0</div>
			<div class="bonus hidden">10</div>
			<div class="bonus hidden">20</div>
			<div class="bonus hidden">30</div>
		</div>
		<div class="team" id="team2">
			<h2><?php echo $_POST['team2']; ?></h2>
			<br />
			<div class="score">
				<p id="score2">0</p>
			</div>
			<div class="2-1 power">15</div>
			<div class="2-2 power">15</div>
			<div class="2-3 power">15</div>
			<div class="2-4 power">15</div>
			<div class="2-1 player"> <?php 
				$temp = $_POST['p21'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp;
			?> </div>
			<div class="2-2 player">
				<?php $temp = $_POST['p22'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp;?>
			</div>
			<div class="2-3 player">
				<?php 
				$temp = $_POST['p23'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="2-4 player">
				<?php $temp = $_POST['p24'];
				if (strlen($temp) > 9) {
					$temp = substr($temp, 0, 8) . "...";
				}
				echo $temp; ?>
			</div>
			<div class="2-1 neg">-5</div>
			<div class="2-2 neg">-5</div>
			<div class="2-3 neg">-5</div>
			<div class="2-4 neg">-5</div>
			<div class="bonus hidden">0</div>
			<div class="bonus hidden">10</div>
			<div class="bonus hidden">20</div>
			<div class="bonus hidden">30</div>
		</div>
		<div id="menubar">
			<div class="menubar-items" id="undo-btn">Undo</div>
			<div class="menubar-items" id="subs-btn">Substitutions</div>
			<div class="menubar-items" id="scoresheet-btn">View Score Sheet</div>
			<div class="menubar-items" id="edit-btn">Edit Scores</div>
			<div class="menubar-items" id="clock-btn">Start Clock</div>
			<div class="menubar-items" id="endgame-btn">End Game</div>
		</div>
	</div>
	<div class="bottom">text</div>
	<script type="text/javascript">
		function updateScore(teamNumber, add) {
			var scoreId = "score" + teamNumber;
			/*var currentScore = +document.getElementById(scoreId).innerHTML;
			currentScore += add;
			document.getElementById(scoreId).innerHTML = currentScore;*/

			score[teamNumber] += add;
			document.getElementById(scoreId).innerHTML = score[teamNumber];
		}
		function makeInactive(teamNumber) {
			var teamId = "team" + teamNumber;
			$("#" + teamId + " .power").addClass("hidden");
			$("#" + teamId + " .neg").addClass("hidden");
			$("#" + teamId + " .player").addClass("player-inactive").removeClass("player");
		}
		function bonus(teamNumber) {
			// Hide current stuff
			var teamId = "team" + teamNumber;
			$("#" + teamId + " .power").addClass("hidden");
			$("#" + teamId + " .neg").addClass("hidden");
			$("#" + teamId + " .player").addClass("hidden");

			// Show bonus stuff
			$("#" + teamId + " .bonus").removeClass("hidden");
		}
		function tossup() {
			$(".power, .player, .neg").removeClass("hidden");
			$(".player-inactive").addClass("player").removeClass("player-inactive");
			$(".bonus").addClass("hidden");
		}

		$(".power").click(function() {
			var points = +this.innerHTML;	// eventually this should be $_POST('powerValue'); or equivalent
			var team = +this.className.split(" ")[0].split("-")[0];
			var player = +this.className.split(" ")[0].split("-")[1];
			var otherTeam = (team + 1) % 2;
			if (otherTeam == 0) otherTeam = 2;
			updateScore(team, points);
			makeInactive(otherTeam);
			bonus(team);
		});

		$(".player").click(function() {
			if ($(this).is(".player-inactive")) {
				return;
			}
			var points = 10;	// eventually this should be $_POST('powerValue'); or equivalent
			var team = +this.className.split(" ")[0].split("-")[0];
			var player = +this.className.split(" ")[0].split("-")[1];
			var otherTeam = (team + 1) % 2;
			if (otherTeam == 0) otherTeam = 2;
			updateScore(team, points);
			makeInactive(otherTeam);
			bonus(team);
		});

		$(".neg").click(function() {
			var points = +this.innerHTML;	// eventually this should be $_POST('powerValue'); or equivalent
			var team = +this.className.split(" ")[0].split("-")[0];
			var player = +this.className.split(" ")[0].split("-")[1];
			var otherTeam = (team + 1) % 2;
			if (otherTeam == 0) otherTeam = 2;
			updateScore(team, points);
		});
		/*
		$("#team1 .power").click(function() {
			var score = +this.innerHTML;
			updateScore(1, score);
			makeInactive(2);
			bonus(1);
		});
		$("#team1 .player").click(function() {
			if (!$(this).is(".player-inactive")) {
				updateScore(1, 10);
				makeInactive(2);
				bonus(1);
			}
		});
		$("#team1 .neg").click(function() {
			updateScore(1, -5);
		});
		$("#team2 .power").click(function() {
			updateScore(2, 15);
			makeInactive(1);
			bonus(2);
		});
		$("#team2 .player").click(function() {
			if (!$(this).is(".player-inactive")) {
				updateScore(2, 10);
				makeInactive(1);
				bonus(2);
			}
		});
		$("#team2 .neg").click(function() {
			updateScore(2, -5);
		});*/
		$("#team1 .bonus").click(function() {
			var score = +this.innerHTML;
			updateScore(1, score);
			tossup();
		});
		$("#team2 .bonus").click(function() {
			var score = +this.innerHTML;
			updateScore(2, score);
			tossup();
		});
	</script>
</body>
</html>