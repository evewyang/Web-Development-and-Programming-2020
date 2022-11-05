<?php
	$new_firstname = $_POST['new_firstname'];
	$new_lastname = $_POST['new_lastname'];
	$new_username = $_POST['new_username'];
	$new_password = $_POST['new_password'];

	//check if all fields are filled
	if ($new_firstname == "" || $new_lastname == "" || $new_username == "" || $new_password == "") {
		header("Location: register.php?registererror=empty");
		exit();
	}
	//no empty fields; check validity of each file
	include('config.php');
	$file = $file_path."/studentaccounts.txt";
	$student_accounts = file_get_contents($file);
    $student_accounts = trim($student_accounts);
    $split_student_accounts = explode("\n",$student_accounts);
	foreach ($split_student_accounts as $key => $value) {
	   $split_student_accounts[$key] = explode(",", $split_student_accounts[$key]);
	}
	//saved in order: username, password, firstname, lastname 
	$error_username = "false";
	$error_password = "false";
	$error_firstname = "false";
	$error_lastname = "false";
	//check username
	foreach ($split_student_accounts as $key => $value) {
		if ($new_username == $split_student_accounts[$key][0]) {
			$error_username = "same";
			break;
		}
	}
	for ($i = 0; $i < strlen($new_username);$i++){
		if (ctype_space($new_username[$i])) {
			$error_username = "space";
			break;
		}
	}
	if (!ctype_alnum($new_username)){
		$error_username = "true";
	}
	//check password 
	if (!ctype_alnum($new_password)){
		$error_password = "true";
	}
	//check firstname
	if (!ctype_alpha($new_firstname)){
		$error_firstname = "true";
	}
	//check lastname
	if (!ctype_alpha($new_lastname)){
		$error_lastname = "true";
	}
	//finished checking:
	if($error_username == "false" && $error_password == "false" && $error_firstname == "false" && $error_lastname == "false"){
		//if no error, file_put_contents, FILE_APPEND
		file_put_contents($file,$new_username.",".$new_password.",".$new_firstname.",".$new_lastname."\n",FILE_APPEND);
		header("Location:register.php?register=success");
		exit();
	}else{
		//if has error, direct back with GET superglobals and print error messgaes
		//no saving to files
		header("Location:register.php?error_username=".$error_username."&error_password=".$error_password."&error_firstname=".$error_firstname."&error_lastname=".$error_lastname);
		exit();
	}

	
?>