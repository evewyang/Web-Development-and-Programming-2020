<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if ($username) {
		if ($password) {
			//both are entered
			if ($username == "pikachu" && $password == "pokemon") {
				//If both the "username" and "password" fields are filled in AND they are correct ("pikachu" / "pokemon" the browser should be redirected back to "micro06.php" with a GET variable attached. Some secret text should appear on the page at this point since the user can be considered "logged in" (note that this is NOT how we would do this on a "real" website, but it's a good demo to learn about the moving parts of a server-side application!)
				header("Location: micro06.php?log_in=true");
				exit();
			}else{
				//If both the "username" and "password" fields are filled in but they do not match the correct username / password ("pikachu" / "pokemon") the browser should be redirected back to "micro06.php" with a GET variable attached to it. This variable should inform the "micro06.php" page that the username/password combo is incorrect and an appropriate error message should appear.
				header("Location: micro06.php?incorrect_combo=true");
				exit();
			}
		}else{
			//no password entered
			header("Location: micro06.php?error_password=empty");
			exit();
		}
	}else{
		//If the user left the "username" field empty, the page should redirect back to the "micro06.php" page with a GET variable attached to it. This variable should inform the "micro06.php" page that the username was missing and an appropriate error message should appear.
		if ($password) {
			header("Location: micro06.php?error_username=empty");
			exit();
		}else{
			//If the user left the "password" field empty, the page should redirect back to the "micro06.php" page with a GET variable attached to it. This variable should inform the "micro06.php" page that the password was missing and an appropriate error message should appear.
			header("Location: micro06.php?error_username=empty&error_password=empty");
			exit();
		}
	}
?>