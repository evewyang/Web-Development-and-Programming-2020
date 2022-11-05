<?php include("config.php") ?>
<?php
	//get the skills & evaluate
	$skill_result = file_get_contents($path."/skill_result.txt");
	$skill_result = trim($skill_result);
	$skill_result_split = explode("\n", $skill_result);
	foreach ($skill_result_split as $key => $value) {
		$skill_result_split[$key] = explode(",", $skill_result_split[$key]);
	}
	$count_result = array();
	$sum_result = array();
	foreach ($skill_result_split as $key => $value) {
		if (!isset($count_result[$skill_result_split[$key][0]])) {
			$count_result[$skill_result_split[$key][0]] = 1;
		}else{
			$count_result[$skill_result_split[$key][0]] += 1;
		}
		if (!isset($sum_result[$skill_result_split[$key][0]])) {
			$sum_result[$skill_result_split[$key][0]] = $skill_result_split[$key][1];
		}else{
			$sum_result[$skill_result_split[$key][0]] += $skill_result_split[$key][1];
		}
	}
	$percent = array("HTML"=>"0%","CSS"=>"0%","Matlab"=>"0%","Java"=>"0%","Python"=>"0%");
	//divide to get percent
	foreach ($percent as $key => $value) {
		if (!isset($count_result[$key])) {
			$percent[$key] = "0%";
		}else{
			$percent[$key] = number_format(($sum_result[$key]/$count_result[$key])/5*100,2)."%";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wenhan Yang -- CV</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style type="text/css">
		#bar_html{
			border: 1px solid gray;
			border-left: none;
			width: <?php print $percent["HTML"];?>;
			height: 40px;
			margin-top: 40px;
			margin-bottom: 60px;
			background-color: lightblue;
			color: gray;
		}
		#bar_css{
			border: 1px solid gray;
			border-left: none;
			width: <?php print $percent["CSS"];?>;
			height: 40px;
			margin-top: 40px;
			margin-bottom: 60px;
			background-color: lightblue;
			color: gray;
		}
		#bar_matlab{
			border: 1px solid gray;
			border-left: none;
			width: <?php print $percent["Matlab"];?>;
			height: 40px;
			margin-top: 40px;
			margin-bottom: 60px;
			background-color: lightblue;
			color: gray;
		}
		#bar_java{
			border: 1px solid gray;
			border-left: none;
			width: <?php print $percent["Java"];?>;
			height: 40px;
			margin-top: 60px;
			margin-bottom: 60px;
			background-color: lightblue;
			color: gray;
		}
		#bar_python{
			border: 1px solid gray;
			border-left: none;
			width: <?php print $percent["Python"];?>;
			height: 40px;
			margin-top: 60px;
			background-color: lightblue;
			color: gray;
		}
	</style>
</head>
<body>
	<div id="cover">
		<div id="greeting"></div>
	</div>
	<div id="nav_bar">
		<a href="#education" class="tab active" data-navtag="#about">ABOUT</a>
		<a href="#about" class="tab" data-navtag="#education">EDUCATION & EXPERIENCES</a>
		<a href="#about" class="tab" data-navtag="#skills">SKILLS & INTERESTS</a>
		<a href="#about" class="tab" data-navtag="#contact">CONTACT ME</a>
	</div>
	<div id="content">
		<div id="left_info">
			<div><img src="images/me.png" alt="Wenhan Yang" class="profile"></div>
			<h2>Wenhan Yang</h2>
			<p>Student at <a href="https://www.nyu.edu">New York Univeristy</a></p>
			<p>Mathematics/CS Major</p>
			<p>CAS 2022</p>
			<p style="margin-bottom: 4vw">New York, NY</p>
			<p><a href="contact-me.html">wy818@nyu.edu</a></p>
			<p>(123)-456-7890</p>
			<div class="social-media">
				<a href="https://www.linkedin.com/in/雯涵-杨-69434b170/?locale=en_US"><img src="images/icons/linkedin.svg" alt="linkedin icon"></a>
				<a href="https://www.facebook.com/profile.php?id=100009882222258&ref=bookmarks"><img src="images/icons/facebook.svg" alt="facebook icon"></a>
				<a href="https://www.instagram.com"><img src="images/icons/instagram.svg" alt="instagram icon"></a>
				<a href="https://twitter.com"><img src="images/icons/twitter.svg" alt="twitter icon"></a>
			</div>
		</div>
		<div id="right_info">
			<div id="about" class="section"><h1>About</h1><?php include($path."/about.txt")?></div>
			<div id="education" class="hidden section">
				<div class="edu_col"><h1>Education</h1><h4>WHAT I HAVE LEARNED</h4><?php include($path."/education.txt")?></div>
				<div class="edu_col"><h1>Experience</h1><h4>WHERE I HAVE WORKED</h4><?php include($path."/experience.txt")?></div>
			</div>
			<div id="skills" class="hidden section">
				<p style="color: gray"><em>*results are based on teacher surveys.</em></p>
				<br><br>
				<div id="left_icons">
					<img src="images/icons/html5-logo.svg" alt="html5 logo" style="margin-bottom: 5px">
					<img src="images/icons/css-logo.svg" alt="css logo" style="margin-bottom: 5px">
					<img src="images/icons/matlab-logo.png" alt="matlab logo" style="width: 70%">
					<img src="images/icons/java-logo.svg" alt="java logo">
					<img src="images/icons/python-logo.svg" alt="python logo" style="width: 100%">
				</div>
				<div id="right_chart">
					<!-- TBD: I want to add a bart chart here based on the result of viewer responses based on their recongnization of me. This will be done by an outer php file called "process_surveyresults.php", just like what we did in the Simpson's quiz. -->
					<div id="bar_html"><p style="float: right;"><em><?php print $percent["HTML"];?></em></p></div>
					<div id="bar_css"><p style="float: right;"><em><?php print $percent["CSS"];?></em></p></div>
					<div id="bar_matlab"><p style="float: right;"><em><?php print $percent["Matlab"];?></em></p></div>
					<div id="bar_java"><p style="float: right;"><em><?php print $percent["Java"];?></em></p></div>
					<div id="bar_python"><p style="float: right;"><em><?php print $percent["Python"];?></em></p></div>
				</div>
			</div>
			<div id="contact" class="hidden section">
				<form action="mailto:wy818@nyu.edu" method="post" enctype="text/plain" id="web-form">
			    	<label for="fname">First Name:</label>
			    	<input type="text" id="fname" name="firstname" placeholder="Your first name.." required>

      				<label for="lname">Last Name: </label>
      				<input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

					<label for="email">E-mail:</label>
					<input type="text" id="email" name="email" placeholder="E-mail address.." required>

					<label for="subject">Subject</label>
    				<textarea id="subject" name="subject" placeholder="Write something.." style="height:10vw;"></textarea>

					<input type="submit" value="Send">
					<input type="reset" value="Reset">
				</form>
			</div>
		</div>

	</div>
	<div id="float_menu">
		<a href="survey.php"><div id="survey">&#128203;</div></a>
		<a href="game.php"><div id="game">&#129300;</div></a>
		<div id="like">&#128077;<span id="num_like">0</span></div>
		<div id="dislike">&#128078;<span id="num_dislike">0</span></div>
		<a href="admin.php"><div id="admin">&#127968;</div></a>
		<button id="close_menu" data-state="close">X</button>
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
	            	contentDivs[j].classList.add("hidden")
	          	}
	          	document.querySelector(event.currentTarget.dataset.navtag).classList.remove("hidden");
	        }
	      }

	      	//dynamic feature (1)
		    //greeting with the daily time

			let currentTime = new Date();
			let hours = currentTime.getHours();
			let greeting;
			let cover = document.getElementById('cover');
			let htmlBackground = document.querySelector('html');
			if (hours >= 0 && hours < 6){
				greeting = "The Night Grows late...";
				cover.style.backgroundImage = 'url("images/backgrounds/night.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/night_opacity.jpg")';
			}else if (hours >= 6 && hours < 12){
				greeting = "Good Morning!";
				cover.style.backgroundImage = 'url("images/backgrounds/morning.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/morning_opacity.jpg")';
			}else if (hours >= 12 && hours < 18){
				greeting = "Good Afternoon!";
				cover.style.backgroundImage = 'url("images/backgrounds/afternoon.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/afternoon_opacity.jpg")';
			}else{
				greeting = "Good Evening!";
				document.getElementById("greeting").style.color = "white";
				document.getElementById("greeting").style.textShadow = "gray 2px 2px";
				cover.style.backgroundImage = 'url("images/backgrounds/evening.jpg")';
				htmlBackground.style.backgroundImage = 'url("images/backgrounds/evening_opacity.jpg")';
			}
			document.getElementById("greeting").innerHTML = greeting + " <br><br>Welcome to My Home Page!";
			
			//dynamic feature (2)
			//close button of the side menu
			let closeBtn = document.getElementById("close_menu");
			closeBtn.onclick = function(event){
				let options = document.querySelectorAll("#float_menu div");
				if(event.currentTarget.dataset.state == "close"){
					for(let i = 0; i < options.length; i++){
						options[i].classList.add("hidden");
					}
					closeBtn.innerHTML = "?";
					closeBtn.style.backgroundColor = "yellow";
					event.currentTarget.dataset.state = "open";
				}else{
					for(let i = 0; i < options.length; i++){
						options[i].classList.remove("hidden");
					}
					closeBtn.innerHTML = "X";
					closeBtn.style.backgroundColor = "red";
					event.currentTarget.dataset.state = "close";
				}
			}


			//dynamic feature (3)
			//ajax like&dislike button
			let likeBtn = document.getElementById('like');
			let dislikeBtn = document.getElementById('dislike');
			//get like & dislike numbers & cookie 'favor' value
			function getLikeDislikeFirstTime(){
				$.ajax({
					url: 'data/like_dislike.txt?nochache='+Math.random(),
					type: 'GET',
					data: {},
					success: function(data,status){
						let item = data.split('\n');
						for(let i = 0; i< item.length; i++){
							item[i] = item[i].split(':');
						}
						document.getElementById('num_like').innerHTML = item[0][1];
						document.getElementById('num_dislike').innerHTML = item[1][1];
						<?php
							if ($_COOKIE['favor']=='like') {?>
								likeBtn.style.backgroundColor = 'red';
								dislikeBtn.style.backgroundColor = 'white';
								<?php
							}elseif($_COOKIE['favor']=='dislike'){?>
								likeBtn.style.backgroundColor = 'white';
								dislikeBtn.style.backgroundColor = 'red';
								<?php
							}
						?>
					}
				})
			}

			function getLikeDislike(){
				$.ajax({
					url: 'data/like_dislike.txt?nochache='+Math.random(),
					type: 'GET',
					data: {},
					success: function(data,status){
						let item = data.split('\n');
						for(let i = 0; i< item.length; i++){
							item[i] = item[i].split(':');
						}
						document.getElementById('num_like').innerHTML = item[0][1];
						document.getElementById('num_dislike').innerHTML = item[1][1];
						setTimeout(getLikeDislike,1000);
						
					}
				})
			}

			getLikeDislikeFirstTime();
			getLikeDislike();

			likeBtn.onclick = function(event){
				
				$.ajax({
					url: 'like_dislike.php',
					type: 'GET',
					data:{
						favor: 'like'
					},
					success: function(data,status){
						likeBtn.style.backgroundColor = 'red';
						dislikeBtn.style.backgroundColor = 'white';
					}
				})
			}
			dislikeBtn.onclick = function(event){
				
				$.ajax({
					url: 'like_dislike.php',
					type: 'GET',
					data:{
						favor: 'dislike'
					},
					success: function(data,status){
						likeBtn.style.backgroundColor = 'white';
						dislikeBtn.style.backgroundColor = 'red';
					}
				})
			}
			//dynamic feature (4)
			//save game visits' history
			let gameBtn = document.getElementById("game");
			gameBtn.onclick = function(event){
				$.ajax({
					url: 'gamehistory.php',
					type: 'GET',
					data:{},
					success: function(data,status){
					}
				})
			}
		})
	</script>
</body>
</html>