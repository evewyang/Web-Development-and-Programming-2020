<!DOCTYPE html>
<html>
<head>
	<title>Micro 07</title>
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
	<h1>Micro 07</h1>
	<?php
		if ($_COOKIE["micro_07_login"] == "true") {
			// include("config.php");
			// file_put_contents($filename, "successful\n",FILE_APPEND);
			?>
			<div>You are logged in!</div>

		<?php
		}else{?>
			<form action="micro07_process.php" method="POST">
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
			</form>
			<?php
		}
	?>
	

</body>
</html>