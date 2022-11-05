<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	include('config.php');
	
	if ($username) {
		if ($password) {
			//both are entered
			if ($username == "pikachu" && $password == "pokemon") {
				file_put_contents($filename, "successful\n",FILE_APPEND);
				setcookie("micro_07_login","true");
				header("Location: micro07.php?");
				exit();
			}else{
				file_put_contents($filename, "unsuccessful\n",FILE_APPEND);
				header("Location: micro07.php?incorrect_combo=true");
				exit();
			}
		}else{
			//no password entered
			file_put_contents($filename, "missing\n",FILE_APPEND);
			header("Location: micro07.php?error_password=empty");
			exit();
		}
	}else{
		file_put_contents($filename, "missing\n",FILE_APPEND);
		if ($password) {
			header("Location: micro07.php?error_username=empty");
			exit();
		}else{
			header("Location: micro07.php?error_username=empty&error_password=empty");
			exit();
		}
	}
?>