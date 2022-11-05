<!DOCTYPE html>
<html>
<head>
	<title>Micro 06</title>
	<style type="text/css">
		strong{
			color: red;
		}
		h2{
			color: blue;
		}
	</style>
</head>
<body>
	<h1>Micro 06</h1>
	<form action="micro06_process.php" method="POST">
		Username: <input type="text" name="username">
		<?php
			if($_GET["error_username"]){
				print("<strong>Empty Username!</strong>");
			}
		?>
		<br>

		Password: <input type="text" name="password">
		<?php
			if($_GET["error_password"]){
				print("<strong>Empty Password!</strong>");
			}
		?>
		<br>
		<?php
			if($_GET["incorrect_combo"]){
				print("<strong>Incorrect username/password!</strong>");
			}elseif($_GET["log_in"]){
				print("<strong>Log in Successful!</strong>");
			}
		?>
		<br>
		<input type="submit">
		<?php
			if($_GET["log_in"]){
				print "<h2>You have revealed this secret text!</h2>";
			}
		?>
	</form>

</body>
</html>