<?php
	//grab the username and password
	$username = $_POST['admin_username'];
	$password = $_POST['admin_password'];

	//open the admin.txt file
	include('config.php');
	$data = file_get_contents($path."/adminaccounts.txt");

	//trim out the white space
	$data = trim($data);
	$split_data = explode("\n",$data);
	foreach ($split_data as $key => $value) {
		$split_data[$key] = explode(",", $split_data[$key]);
	}

	foreach ($split_data as $key => $value) {
		if ($split_data[$key][0] == $username && $split_data[$key][1]== $password) {

			setcookie("adminlogin","yes");
			setcookie("username",$username);
			setcookie("firstname",$split_data[$key][2]);
			setcookie("lastname",$split_data[$key][3]);

			$time = time();
			$track = $_SERVER['REMOTE_ADDR']."|".$time."|".$username."|log in\n";
			file_put_contents($path."/admin_log.txt",$track,FILE_APPEND);

			//direct back to the admin.php
			header("Location: admin.php?login=success");
			
			exit();
		}

	}
	//login failed
	header("Location: admin.php?loginerror=true");
	exit();


?>