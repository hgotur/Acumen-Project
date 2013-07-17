<!DOCTYPE html>
<html>
<head>
	<title>Quiz Bowl Score Keeper</title>
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link href='http://fonts.googleapis.com/css?family=Comfortaa:700,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>
<body>
	<div id="title">Score Keeper</div>
	<div class="screen">
		<form id="form1" action="scoreKeeper.php" method="post">
			<h2 class="left">Team 1</h2><h2 class="right">Team 2</h2> <br />
			<div class="left">
				<p>Team Name:</p>
				<p>Player 1:</p>
				<p>Player 2:</p>
				<p>Player 3:</p>
				<p>Player 4:</p>
			</div>
			<div class="left">
				<input type="text" name="team1" value="Team 1" /> <br />
				<input type="text" name="p11" value="Player 1" /> <br />
				<input type="text" name="p12" value="Player 2" /> <br />
				<input type="text" name="p13" value="Player 3" /> <br />
				<input type="text" name="p14" value="Player 4" /> <br />
			</div>
			<div class="right">
				<input type="text" name="team2" value="Team 2" /> <br />
				<input type="text" name="p21" value="Player 1" /> <br />
				<input type="text" name="p22" value="Player 2" /> <br />
				<input type="text" name="p23" value="Player 3" /> <br />
				<input type="text" name="p24" value="Player 4" /> <br />
			</div>
			<div class="right">
				<p>Team Name:</p>
				<p>Player 1:</p> 
				<p>Player 2:</p> 
				<p>Player 3:</p> 
				<p>Player 4:</p> 
			</div>
		</form>
		<div class="bar">
			<div id="submit">Submit</div>
		</div>
	</div>
	<div class="bottom">text</div>
	<script type="text/javascript">
		$("#submit").click(function() {
			$("#form1").submit();
		});
	</script>
</body>
</html>