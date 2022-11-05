<?php
	include("config.php");
	//destroy all 4 cookies
	setcookie("firstname","",time()-3600);
	setcookie("lastname","",time()-3600);
	setcookie("username","",time()-3600);
	setcookie("login","",time()-3600);
	if($_COOKIE['identity'] == "admin"){
		//upload the login record to adminlog.txt
		$time = time();
		file_put_contents($file_path."/adminlog.txt",$time.",".$_COOKIE['username'].",logout\n",FILE_APPEND);
	}
	setcookie("identity","",time()-3600);
	//send back to admin
	header("Location: admin.php");
	exit();
?>