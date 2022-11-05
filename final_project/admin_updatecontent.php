<?php
	//security check: check login cookie first
	if (!isset($_COOKIE["adminlogin"])){
		header("Location: admin.php?security=failure");
		exit();
	}

	//secure login
	//get the file path
	include("config.php");
	//write the text into files respectively
	$text_about = $_POST['text_about'];
	$text_education = $_POST['text_education'];
	$text_experience = $_POST['text_experience'];

	file_put_contents($path."/about.txt", $text_about);
	file_put_contents($path."/education.txt", $text_education);
	file_put_contents($path."/experience.txt", $text_experience);

	//upload the login record to adminlog.txt
	$time = time();
	$track = $_SERVER['REMOTE_ADDR']."|".$time."|".$_COOKIE['username']."|update\n";
	file_put_contents($path."/admin_log.txt",$track,FILE_APPEND);

	header("Location: admin.php");
	exit();


?>