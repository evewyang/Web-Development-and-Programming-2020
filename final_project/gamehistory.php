<?php
	//save game history
	include("config.php");
	$file = $path."/game_visits.txt";
	$time = time();
	$track = $_SERVER['REMOTE_ADDR']."|".$time."\n";
	file_put_contents($file,$track,FILE_APPEND);
	exit();
?>