<?php
	//security check: check login cookie first
	if (!isset($_COOKIE['login']) || $_COOKIE["identity"] != "admin"){
		header("Location: admin.php?security=failure");
		exit();
	}

	//secure login
	//get the file path
	include("config.php");
	//write the text into files respectively
	$text_home = $_POST['text_home'];
	$text_about = $_POST['text_about'];
	$text_policies = $_POST['text_policies'];
	$text_alert = $_POST['text_alert'];

	file_put_contents($file_path."/home.txt", $text_home);
	file_put_contents($file_path."/about.txt", $text_about);
	file_put_contents($file_path."/policies.txt", $text_policies);
	file_put_contents($file_path."/alert.txt", $text_alert);

	//upload the login record to adminlog.txt
	$time = time();
	file_put_contents($file_path."/adminlog.txt",$time.",".$_COOKIE['username'].",update\n",FILE_APPEND);

	header("Location: admin.php");
	exit();


?>