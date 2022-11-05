<?php
	//fetch data from absolute path
	include('config.php');
	$alldata = file_get_contents($filename);
	$allSimpsons = explode("\n", $alldata);
	$number_of_results = sizeof($allSimpsons)-1;
	//set the result array; do counting on results
	$result = array();
	for ($i = 0; $i<sizeof($allSimpsons);$i++){

		if (!isset($result[$allSimpsons[$i]])) {
		//the key is not set yet, set the key
			$result[$allSimpsons[$i]] = 1;
		}else{
			$result[$allSimpsons[$i]] += 1;
		}
	}
	//remove the null key from the result
	array_pop($result);
	//set the percentage for displaying the result
	$percent = array("Homer" =>"100%","Marge"=>"100%","Bart"=>"100%","Lisa"=>"100%");

	foreach ($percent as $name => $value) {
		if($result[$name] == null){
			$percent[$name] = "0%";
		}else{
			$percent[$name] = number_format($result[$name]/$number_of_results*100,2)."%";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Global Results</title>
	<style type="text/css">
		body{
			font-family: Helvetica;
			background-image: url("images/backgrounds/background6.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed; 
			color: white;
		}
		#bar_chart{
			/*position: relative;*/
			width: 90%;
			margin: 50px 0 50px 0;
		}
		#bar_homer{
			/*position: absolute;*/
			border: 1px solid black;
			width: <?php print $percent["Homer"];?>;
			height: 60px;
			background-color: blue;
		}
		#bar_marge{
			/*position: absolute;*/
			border: 1px solid black;
			width: <?php print $percent["Marge"];?>;
			height: 60px;
			background-color: brown;
		}
		#bar_bart{
			/*position: absolute;*/
			border: 1px solid black;
			width: <?php print $percent["Bart"];?>;
			height: 60px;
			background-color: green;
		}
		#bar_lisa{
			/*position: absolute;*/
			border: 1px solid black;
			width: <?php print $percent["Lisa"];?>;
			height: 60px;
			background-color: red;
		}
		a{
			color: white;
		}
		p{
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Simpsons Quiz Results</h1>
	<div id="bar_chart">
		<div id="bar_homer"><?php print "Homer ".$percent["Homer"];?></div>
		<div id="bar_marge"><?php print "Marge ".$percent["Marge"];?></div>
		<div id="bar_bart"><?php print "Bart ".$percent["Bart"];?></div>
		<div id="bar_lisa"><?php print "Lisa ".$percent["Lisa"];?></div>
	</div>
	<?php print("<p style='text-align:center;'>".$number_of_results." people have taken this quiz.</p>");?>
	<!-- cookies? -->
	<p><a <?php
		if($_GET["begin"]){
			print("href='index.php'");
		}else{
			print("href='processresults.php'");
		}
	?>>Back to Quiz</a></p>
	<?php
		if(!$_GET["begin"]){
			print("<p><a href='index.php'>Try Again?</a></p>");
		}
	?>
</body>
</html>