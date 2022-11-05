<?php
	//grab the username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
	$identity = $_POST['identity'];

	//open the teacher's account.txt file
	include('config.php');
	if ($identity == "id_admin") {
		//admin login
		$data = file_get_contents($file_path."/teacheraccounts.txt");
	}elseif ($identity == "id_student") {
		//student login
		$data = file_get_contents($file_path."/studentaccounts.txt");
	}else{
		//default; user didn't select
		//directly send back to admin.php, no other checking needed.
		header("Location: admin.php?loginerror=yes&id=empty");
		exit();
	}
	//trim out the white space
	$data = trim($data);
	$split_data = explode("\n",$data);
	foreach ($split_data as $key => $value) {
			$split_data[$key] = explode(",", $split_data[$key]);
		}
	//see if the supplied info matches any content of the file
	foreach ($split_data as $key => $value) {
		if ($split_data[$key][0] == $username && $split_data[$key][1]== $password) {
			//log in successful
			print('login successful!');
			//if everything is okay, drop a cookie on their computer
			setcookie("login","yes");
			//welcome the user with their name
			setcookie("firstname",$split_data[$key][2]);
			setcookie("lastname",$split_data[$key][3]);
			setcookie("username",$split_data[$key][0]);
			if ($identity == "id_admin") {
				//upload the login record to adminlog.txt
				$time = time();
				file_put_contents($file_path."/adminlog.txt",$time.",".$username.",login\n",FILE_APPEND);
				setcookie("identity","admin");
			}elseif ($identity == "id_student") {
				setcookie("identity","student");
			}
			//direct back to the admin.php
			header("Location: admin.php");
			exit();
		}

	}
	//if not, send back to admin.php
	header("Location: admin.php?loginerror=yes");
	exit();
	
?>