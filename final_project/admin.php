<?php include("config.php"); include("config1.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Wenhan Yang -- CV</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style type="text/css">
		.usage_table{
			width: 320px;
			text-align: center;
			border-bottom: 1px solid gray;
			margin-left: 5px;
		}
		.usage_table caption{
			color: blue;
		}
		.usage_box{
			display: block;
			float: left;
			width: 330px;
			height: 600px;
			box-sizing: border-box;
			text-align: center;
		}
		.scroll_box{
			font-family: Helvetica, sans-serif;
			height: 500px;
			width: 280px;
			line-height: 17px;
			padding-left: 45px;
			overflow: auto;
			font-size: 13px;
		}
		#admin_logs{
			text-align: center;
		}
		#admin_logs .usage_table{
			width: 600px;
			text-align: center;
			border-bottom: 1px solid gray;
			margin: auto;
		}
		#admin_logs .scroll_box{
			width: 600px;
			margin: auto;
		}
		.clear_button{
			background-color: blue;
		  	color: white;
		  	padding: 12px 20px;
		  	border: none;
		 	border-radius: 4px;
		  	cursor: pointer;
		  	margin-top: 10px;
		}
		.survey_results_display{
			display: block;
			width: 80%;
			height: 160px;
			border: 1px solid black;
			border-radius: 10px;
			overflow: auto;
		}
		#survey_results{
			width: 100%;
			height: 680px;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
	<div id="cover">
		<a href="index.php"><button id="admin_login_button" style="width: 100px;font-size: 20px;border: 2px solid black;background-color: beige;">Back</button></a>
		<div id="greeting"><h1>Admin</h1></div>
	</div>
			
	<div id="content">
		<?php
			if ($_COOKIE['adminlogin'] || $_GET['login']){
				if($_COOKIE['firstname']&&$_COOKIE['lastname']){
					?>
					<script type="text/javascript">
					document.getElementById('greeting').innerHTML = "<h2>Welcome, "+ <?php print('"'.$_COOKIE['firstname']." ".$_COOKIE['lastname'].'!</h2>"')?>;
					</script>
					<?php
				}
				?>
				<div id="nav_bar">
					<a href="#survey_results" class="tab active" data-navtag="#edit_contents">EDIT CONTENTS</a>
					<a href="#edit_contents" class="tab" data-navtag="#survey_results">SURVEY RESULTS</a>
					<a href="#edit_contents" class="tab" data-navtag="#usage_logs">USAGE LOGS</a>
					<a href="#edit_contents" class="tab" data-navtag="#admin_logs">ADMIN LOGS</a>
					<form method="POST" action="process_logout.php" style="float: right; margin: 4px 5px 0 0;"><input type="submit" value="LOG OUT"></form>
				</div>
				<div id="edit_contents" class="section" style="clear: both;">
					<form method="POST" action="admin_updatecontent.php">
	                  About:<br>
	                  <textarea name="text_about"><?php include($path.'/about.txt'); ?></textarea><br>
	                  Education:
	                  <textarea name="text_education"><?php include($path.'/education.txt'); ?></textarea><br>
	                  Experience:
	                  <textarea name="text_experience"><?php include($path.'/experience.txt'); ?></textarea><br>
	                  <input type="submit">
	                  <?php
	                    if ($_GET["security"]=="failure") {
	                      ?> <br><strong style="color: red;">You are not authenticated to make changes!</strong>
	                      <?php
	                    }
	                  ?>
	                </form>
				</div>
				<div id="survey_results" class="hidden section">
					Friends & Family:
					<div id="survey_results_close" class="survey_results_display">
						<ul>
						<?php
							$filelist_close = glob($path1.'/friends_and_family/*.txt');
							foreach ($filelist_close as $key => $value) {
								$temp_list = explode("/", $filelist_close[$key]);
								$temp_string = $temp_list[sizeof($temp_list)-1];
								print("<li><a href='/final_project/results/friends_and_family/".$temp_string."'>".$temp_string."</a></li>");
								//for i6:
								//print("<li><a href='https://i6.cims.nyu.edu/~wy818/webdev/final_project/results/friends_and_family/".$temp_string."'>".$temp_string."</a></li>");
							}
						?>
						</ul>
					</div><br><br>
					Teacher/TA/Tutor/Mentor:
					<div id="survey_results_teacher" class="survey_results_display">
						<ul>
						<?php
							$filelist_teacher = glob($path1.'/teacher/*.txt');
							foreach ($filelist_teacher as $key => $value) {
								$temp_list = explode("/", $filelist_teacher[$key]);
								$temp_string = $temp_list[sizeof($temp_list)-1];
								print("<li><a href='/final_project/results/teacher/".$temp_string."'>".$temp_string."</a></li>");
								//for i6:
								//print("<li><a href='https://i6.cims.nyu.edu/~wy818/webdev/final_project/results/teacher/".$temp_string."'>".$temp_string."</a></li>");
							}
						?>
						</ul>
					</div><br><br>
					Visitors:
					<div id="survey_results_visitor" class="survey_results_display">
						<ul>
						<?php
							$filelist_visitor = glob($path1.'/visitor/*.txt');
							foreach ($filelist_visitor as $key => $value) {
								$temp_list = explode("/", $filelist_visitor[$key]);
								$temp_string = $temp_list[sizeof($temp_list)-1];
								print("<li><a href='/final_project/results/visitor/".$temp_string."'>".$temp_string."</a></li>");
								//for i6:
								//print("<li><a href='https://i6.cims.nyu.edu/~wy818/webdev/final_project/results/visitor/".$temp_string."'>".$temp_string."</a></li>");
							}
						?>
						</ul>
					</div>
				</div>
				<div id="usage_logs" class="hidden section">
					<?php include("admin_getusagelogs.php"); ?>
					<!-- user usage history display -->
					<!-- display like history -->
					<div class="usage_box" style="border-right: 2px solid gray;">
						<table class="usage_table">
							<caption>Like (<?php print($data_split[0][1]); ?>)</caption>
							<th>
								<td>IP Address</td>
								<td>Timestamp</td>
							</th>
						</table>
						<div class="scroll_box">
							<table>
								<?php
									if($like_history != ''){
										foreach ($like_history_split as $key => $value) {
											print("<tr><td>".$like_history_split[$key][0]."</td><td style='padding-left:45px;'>".date('Y-m-d H:i:s', $like_history_split[$key][1])."</td></tr>");
										}
									}
								?>
							</table>
						</div>
						<button id="clear_like_history" class="clear_button" data-filename="like_history.txt">Clear</button>
					</div>
					<!-- display dislike history -->
					<div class="usage_box" style="border-right: 2px solid gray;">
						<table class="usage_table">
							<caption>Dislike (<?php print($data_split[1][1]); ?>)</caption>
							<th>
								<td>IP Address</td>
								<td>Timestamp</td>
							</th>
						</table>
						<div class="scroll_box">
							<table>
								<?php
									if($dislike_history != ''){
										foreach ($dislike_history_split as $key => $value) {
											print("<tr><td>".$dislike_history_split[$key][0]."</td><td style='padding-left:45px;'>".date('Y-m-d H:i:s', $dislike_history_split[$key][1])."</td></tr>");
										}
									}
									
								?>
							</table>
						</div>
						<button id="clear_dislike_history" class="clear_button" data-filename="dislike_history.txt">Clear</button>
					</div>
					<!-- display game history -->
					<div class="usage_box">
						<table class="usage_table">
							<caption>Game Visits (<?php 
								if ($game_history == '') {
									print(0);
								}else{
									print(sizeof($game_history_split));
								}
								?>)</caption>
							<th>
								<td>IP Address</td>
								<td>Timestamp</td>
							</th>
						</table>
						<div class="scroll_box">
							<table>
								<?php
									if($game_history != ''){
										foreach ($game_history_split as $key => $value) {
											print("<tr><td>".$game_history_split[$key][0]."</td><td style='padding-left:45px;'>".date('Y-m-d H:i:s', $game_history_split[$key][1])."</td></tr>");
										}
									}
									
								?>
							</table>
						</div>
						<button id="clear_game_history" class="clear_button" data-filename="game_visits.txt">Clear</button>
					</div>	
					
				</div>
				<!-- Admin Logs -->
				<div id="admin_logs" class="hidden section">
					<?php include("admin_getadminlogs.php");?>
					<table class="usage_table">
						<caption>Admin Logs (<?php 
								if ($admin_logs == '') {
									print(0);
								}else{
									print(sizeof($admin_logs_split));
								}
								?>)</caption>
						<th>
							<td>IP Address</td>
							<td>Timestamp</td>
							<td>Username</td>
							<td>Action</td>
						</th>
					</table>
					<div class="scroll_box">
						<table>
							<?php
								if($admin_logs != ''){
									foreach ($admin_logs_split as $key => $value) {
										print("<tr><td style='padding-left:30px;'>".$admin_logs_split[$key][0]."</td><td style='padding-left:60px;'>".date('Y-m-d H:i:s', $admin_logs_split[$key][1])."</td><td style='padding-left:80px;'>".$admin_logs_split[$key][2]."</td><td style='padding-left: 90px;'>".$admin_logs_split[$key][3]."</td></tr>");
									}
								}
								
							?>
						</table>
					</div>
					<button id="clear_admin_logs" class="clear_button" data-filename="admin_log.txt">Clear</button>
				</div>
		<?php
		}else{
			?>
			<br>
			<form id="admin_login_panel" method="POST" action="process_login.php" style="margin: auto;text-align: center;">
				Username: <input type="text" name="admin_username" style="width: 200px;height: 30px;padding: 0;"><br><br>
				Password: <input type="text" name="admin_password" style="width: 200px;height: 30px;padding: 0;margin-left: 6px"><br><br>
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
	

	
	 <!-- bring in the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		//nav_bar & left_info display
			let allTabs = document.querySelectorAll(".tab");
	      	for(let i = 0; i < allTabs.length; i++){
	       		allTabs[i].onclick = function(event){
		          	document.querySelector(".active").classList.remove("active");
		          	event.currentTarget.classList.add("active");
		          	let contentDivs = document.querySelectorAll(".section");
		          	for (let j = 0; j < contentDivs.length; j++){
		            	contentDivs[j].classList.add("hidden");
		          	}
		          	document.querySelector(event.currentTarget.dataset.navtag).classList.remove("hidden");
		        }
		    }
		  	//dynamic feature (1)
		    //greeting with the daily time

			let currentTime = new Date();
			let hours = currentTime.getHours();
			
			let cover = document.getElementById('cover');
			let htmlBackground = document.querySelector('html');
			if (hours >= 0 && hours < 6){
				cover.style.backgroundImage = 'url("images/backgrounds/night.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/night_opacity.jpg")';
			}else if (hours >= 6 && hours < 12){
				cover.style.backgroundImage = 'url("images/backgrounds/morning.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/morning_opacity.jpg")';
			}else if (hours >= 12 && hours < 18){
				cover.style.backgroundImage = 'url("images/backgrounds/afternoon.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/afternoon_opacity.jpg")';
			}else{
				document.getElementById("greeting").style.color = "white";
				document.getElementById("greeting").style.textShadow = "gray 2px 2px";
				cover.style.backgroundImage = 'url("images/backgrounds/evening.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/evening_opacity.jpg")';
			}
			
			let clearLikeBtn = document.getElementById('clear_like_history');
			let clearDislikeBtn = document.getElementById('clear_dislike_history');
			let clearGameBtn = document.getElementById('clear_game_history');
			let clearAdminLogs = document.getElementById('clear_admin_logs');

			function clearHistory(button){
				let file = button.dataset.filename;
				$.ajax({
					url: "admin_clearhistory.php",
					type: 'POST',
					data: {
						filename: file
					},
					success: function(data,status){
						let allItems = document.querySelectorAll('.clear_button');
						let thisItem;
						for (let i = 0; i < allItems.length; i++){
							if (file == allItems[i].dataset.filename) {
								thisItem = allItems[i];
								thisItem.previousElementSibling.children[0].innerHTML = '';
								console.log(thisItem.previousElementSibling.children[0]);
								return;
							}
						}
					}
				})
			}

			//button onlick to clear history
			clearLikeBtn.onclick = function(event){
				clearHistory(this);
			}
			clearDislikeBtn.onclick = function(event){
				clearHistory(this);
			}
			clearGameBtn.onclick = function(event){
				clearHistory(this);
			}
			clearAdminLogs.onclick = function(event){
				clearHistory(this);
			}

			// function getHistories(filename){
			// 	$.ajax({
			// 		url: 'data/like_dislike.txt?nochache='+Math.random(),
			// 		type: 'GET',
			// 		data: {},
			// 		success: function(data,status){
			// 			let item = data.split('\n');
			// 			for(let i = 0; i< item.length; i++){
			// 				item[i] = item[i].split(':');
			// 			}
			// 			document.getElementById('num_like').innerHTML = item[0][1];
			// 			document.getElementById('num_dislike').innerHTML = item[1][1];
			// 			setTimeout(getLikeDislike,1000);
						
			// 		}
			// 	})
			// }

		})
    </script>
</body>
</html>