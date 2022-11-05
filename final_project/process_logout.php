<?php
	include("config.php");
	$time = time();
	$track = $_SERVER['REMOTE_ADDR']."|".$time."|".$_COOKIE['username']."|log out\n";
	file_put_contents($path."/admin_log.txt",$track,FILE_APPEND);

	//destroy all cookies
	setcookie("username","",time()-3600);
	setcookie("adminlogin","",time()-3600);
	setcookie("firstname","",time()-3600);
	setcookie("lastname","",time()-3600);
	
	//send back to the login page of admin
	header("Location: admin.php");
	exit();

?>