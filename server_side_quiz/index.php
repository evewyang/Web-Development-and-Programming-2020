<?php
	setcookie("which_simpson","",time()-3600);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Server-side Quizzing System</title>
	<link rel="stylesheet" type="text/css" href="style_index.css">
</head>
<body>
	<h1>Which Simpson Character Am I?</h1>

	<form action="processresults.php" method="POST">
		<div id="container">
			What is your ideal job?<br>
			<select name="job">
				<option value="default">Select a job</option>
				<option value="bakery_worker">Working at a bakery</option>
				<option value="french_tutor">French tutor</option>
				<option value="prank_specialist">Prank Phone Call Specialist</option>
				<option value="college_professor">College professor</option>
			</select>
			<br>
			What is your favorite food?<br>
			<select name="food">
				<option value="default">Select a favorite food</option>
				<option value="krusty_flakes">Krusty flakes</option>
				<option value="apple_pie">Apple pie</option>
				<option value="organic_food">Anything organic and locally sourced</option>
				<option value="donuts">Donuts</option>
			</select>
			<br>
			What is your preferred hobby?<br>
			<select name="hobby">
				<option value="default">Select a hobby</option>
				<option value="watch_tv">Watching TV</option>
				<option value="knitting">Knitting</option>
				<option value="skateboarding">Skateboarding</option>
				<option value="reading">Reading</option>
			</select>
			<br>
			What is your biggest fear?<br>
			<select name="fear">
				<option value="default">Select your biggest fear</option>
				<option value="sock_puppets">Sock puppets</option>
				<option value="flying">Flying</option>
				<option value="fearless">I'm fearless, man</option>
				<option value="not_a">Getting anything below an A in school</option>
			</select>
			<br>
			<input type="submit" value="What Simpsons character am I?" id="result">
			<?php
				if ($_GET["error"]){
					print("<br><strong>Please fill out all the required fields!</strong>");
				}
			?>
		</div>
	</form>
	<p><a href="results.php?begin=true">See Aggregate Results</a></p>
</body>
</html>