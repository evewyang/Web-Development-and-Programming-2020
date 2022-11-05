<?php
	include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chatroom with Ajax</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style type="text/css">
		body{
			background-image: url("images/dipper.jpg");
		}
	</style>
</head>
<body>
	<h1 style="color: white">Admin Login</h1>
	<a href="index.php"><button id="back_button">Back</button></a>
	<div id="admin_panel">
            <?php
            	if($_COOKIE['adminlogin'] || $_GET['login']){
            		?>
					<div id="admin_menu">
						<form id="clear_content" method="POST" action="clearcontent.php">
							<span style="color: blue">1) Clear Contents? </span>
							<select name="clear_room">
								<option value="room1.txt">room 1</option>
								<option value="room2.txt">room 2</option>
								<option value="room3.txt">room 3</option>
								<option value="room4.txt">room 4</option>
							</select>
							<input type="submit" value="clear">
						</form><br>
						<form id="update_banned_list" method="POST" action="updatebannedlist.php">
							<span style="color: blue">2) Banned List:<br><span style="font-size: 10px">(Please seperate by ",")</span></span>
							<textarea name="filter" id="change_filter" class="scroll_box"><?php 
								$filterAll = file_get_contents($path.'/filter.txt');
								$filterAll = trim($filterAll);
								$filter = explode("\n", $filterAll);
								for ($i=0; $i < sizeof($filter); $i++) {
									print_r("$filter[$i]");
									if ($i != sizeof($filter)-1) {
										print(",");
									}
								}
							?></textarea>
			                <input type="submit" value="update">
						</form>
						<form>
							<br>
							<span style="color: blue">3) Usage Logs:</span>
							<div style="text-align: center; margin-left: 45px">
								<table cellspacing="10px;" style="font-size: 10px;">
									<tr>
						              <th style="padding-right: 25px;padding-left: 10px">IP address</th>
						              <th style="padding-right: 20px">Time stamp</th>
						              <th style="padding-right: 5px">Username</th>
						              <th>Identity</th>
						              <th>Action</th>
						            </tr>
								</table>
							</div>
							<div id="usage_logs">
								<?php
						          $history = file_get_contents($path."/usage_log.txt");
						          $history = trim($history);
						          $split_history = explode("\n",$history);
						          foreach ($split_history as $key => $value) {
						            $split_history[$key] = explode("|", $split_history[$key]);
						          }
						          ?>
						          <table cellspacing="15px;">
						            
						          <?php
						            foreach ($split_history as $key => $value) {
						              print("<tr><td>".$split_history[$key][0]."</td><td>".date('Y-m-d H:i:s', $split_history[$key][1])."</td><td>".$split_history[$key][2]."</td><td>".$split_history[$key][3]."</td><td>".$split_history[$key][4]."</td></tr>");
						            }
						          ?>
						          </table>
						          <?php
						        ?>
							</div>
						</form>
						<form method="POST" action="process_logout.php" style="text-align: center;">
							<br><input type="submit" value="log out">
						</form>
					</div>
            		<?php
            	}else{
            		?>
            		<form id="admin_login_panel" method="POST" action="process_login.php">
						Username: <input type="text" name="admin_username"><br><br>
            			Password: <input type="text" name="admin_password" style="margin-left: 6px"><br><br>
            			<input type="submit" value="Log in">
            		</form>
            		<?php
            	}
            	if ($_GET['loginerror']){
            		?>
            		<br><strong style="color: red">Log in Failed!</strong>
            		<?php
            	}
            ?>
		
	</div>

</body>
</html>