<?php
	if(!$_COOKIE["which_simpson"]){

		$job = $_POST["job"];
		$food = $_POST["food"];
		$hobby = $_POST["hobby"];
		$fear = $_POST["fear"];

		if ($job == "default" || $food == "default" || $hobby == "default" || $fear == "default"){
			header("Location: index.php?error=true");
			exit();
		}

		$homer = 0;
		$marge = 0;
		$bart = 0;
		$lisa = 0;
		//evaluate job
		if ($job == "bakery_worker") {
			$marge += 1;
		}elseif ($job == "french_tutor") {
			$homer += 1;
		}elseif ($job == "prank_specialist"){
			$bart += 1;
		}else{
			$lisa += 1;
		}

		//evaluate food
		if ($food == "donuts") {
			$homer += 1;
		}elseif ($food == "apple_pie") {
			$marge += 1;
		}elseif ($food == "krusty_flakes"){
			$bart += 1;
		}else{
			$lisa += 1;
		}

		//evaluate hobby
		if ($hobby == "watch_tv") {
			$homer += 1;
		}elseif ($hobby == "knitting") {
			$marge += 1;
		}elseif ($hobby == "skateboarding"){
			$bart += 1;
		}else{
			$lisa += 1;
		}

		//evaluate fear
		if ($fear == "sock_puppets") {
			$homer += 1;
		}elseif ($fear == "flying") {
			$marge += 1;
		}elseif ($fear == "fearless"){
			$bart += 1;
		}else{
			$lisa += 1;
		}

		//process the result 
		$arr = array('Homer' => $homer, 'Marge'=> $marge, 'Bart' => $bart, 'Lisa' => $lisa);
		$maxVar = max($arr);
		$maxKey = array_search($maxVar, $arr);
		//save the result
		include("config.php");
		file_put_contents($filename, $maxKey."\n", FILE_APPEND);
		setcookie("which_simpson",$maxKey);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Server-side Quizzing System</title>
	<link rel="stylesheet" type="text/css" href="style_processresults.css">
</head>
<body>
	<div id="container">
		<h1>Which Simpson Character Am I?</h1>
		<div id="character">
			<?php
				if($_COOKIE['which_simpson']){
					$which_simpson = $_COOKIE['which_simpson'];
					print("<img src=images/characters/".$which_simpson.".png>");
				}else{
					print("<img src=images/characters/".$maxKey.".png>");
				}
			?> 
		</div>
		<h2>
			<?php
				if($which_simpson){
					print("You are ".$which_simpson." Simpson!");
				}else{
					print("You are ".$maxKey." Simpson!");
				}
			?>
		</h2>
		<form action="index.php">
			<input type="submit" value="Try Again?">
		</form>
		<p><a href="results.php">See Aggregate Results</a></p>
	</div>
</body>
</html>