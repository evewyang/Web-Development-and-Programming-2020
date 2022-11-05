<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
	<style type="text/css">
		body{
			text-align: center;
			font-family: Helvetica;
			background-image:url("images/backgrounds/survey.jpg"); 
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}
		.hidden{
			display: none;
		}
		strong{
			color: red;
		}
		#container{
			margin: auto;
			width: 750px;
			height: 450px;
			box-sizing: border-box;
			border: 1px solid black;
			border-radius: 10px;
			margin-top: 50px;
			background-color: white;
		}
		#back_button{
			width: 80px;
			height: 26px;
			font-size: 20px;
			border: 2px solid black;
			background-color: beige;
		}
		a{
			text-decoration: none;
			color: black;
		}
		.question{
			font-weight: bold;
			color: brown;
		}
	</style>
</head>
<body>
	<a href="index.php"><div id="back_button">Back</div></a>
	<div id="container">
		<h1>Survey</h1>
		<form method="POST" action="process_surveyresults.php">
			Please Select a field that best describes your relationship with Wenhan:
			<select name="relationship" id="relationship">
				<option value="default">Select a relation</option>
				<option value="teacher">I'm her teacher/TA/tutor/mentor</option>
				<option value="friend_family">I'm her friend/family</option>
				<option value="visitor">I'm just a visitor</option>
			</select>
			<br><strong id="alarm_1" class="hidden">Please select a relation to continue!</strong>

			<!-- survey for visitors -->
			<div id="loose_relation" class="hidden">
				<br>
				<span class="question">1) How would you rate this website?</span>
				<input type="radio" id="visitor_rate_1" name="visitor_rate" value="1">
			  	<label for="visitor_rate_1">1  &nbsp;</label>
			  	<input type="radio" id="visitor_rate_2" name="visitor_rate" value="2">
			  	<label for="visitor_rate_2">2  &nbsp;</label>
			  	<input type="radio" id="visitor_rate_3" name="visitor_rate" value="3">
			  	<label for="visitor_rate_3">3  &nbsp;</label>
			  	<input type="radio" id="visitor_rate_4" name="visitor_rate" value="4">
			  	<label for="visitor_rate_4">4  &nbsp;</label>
			  	<input type="radio" id="visitor_rate_5" name="visitor_rate" value="5">
			  	<label for="visitor_rate_5">5  </label>
			  	<br><br>
			  	<span class="question">2) Do you have any other comments/suggestions for improvement?</span><br><br>
				<textarea maxlength="200" name="visitor_comment" style="width: 400px; height: 100px"></textarea><br>
				<strong style="color: blue;">Make sure you filled in all the blanks before you hit submit.</strong>
				<input type="submit">
			</div>

			<!-- survey for family/friends -->
			<div id="close_relation" class="hidden">
				<br><span class="question">1) In general, what is your impression about Wenhan?</span><br><br>
	 			<textarea maxlength="200" name="close_comment" style="width: 350px; height: 80px"></textarea><br><br>
	 			<span class="question">2) Select some characteristics that suit Wenhan the most:</span><br><br>
	 			<input type="checkbox" id="close_character_1" name="close_character_1" value="Team player">
			  	<label for="close_character_1"> Team player &nbsp;</label>

			  	<input type="checkbox" id="close_character_2" name="close_character_2" value="Accountable">
			  	<label for="close_character_2"> Accountable &nbsp;</label>

			  	<input type="checkbox" id="close_character_3" name="close_character_3" value="Organized">
			  	<label for="close_character_3"> Organized &nbsp;</label>

			  	<input type="checkbox" id="close_character_4" name="close_character_4" value="Punctual">
			  	<label for="close_character_4"> Punctual &nbsp;</label><br>

			  	<input type="checkbox" id="close_character_5" name="close_character_5" value="Problem solver" >
			  	<label for="close_character_5" > Problem solver &nbsp;</label>

			  	<input type="checkbox" id="close_character_6" name="close_character_6" value="Honest">
			  	<label for="close_character_6"> Honest &nbsp;</label>

			  	<input type="checkbox" id="close_character_7" name="close_character_7" value="Creative">
			  	<label for="close_character_7"> Creative &nbsp;</label>

			  	<input type="checkbox" id="close_character_8" name="close_character_8" value="Flexible">
			  	<label for="close_character_8"> Flexible &nbsp;</label><br><br>

				<span class="question">Your name:</span>
				<input type="text" name="close_name" maxlength="20">&nbsp;
				<span class="question">Your email:</span>
				<input type="text" name="close_email"><br><br>
				<strong style="color: blue;">Make sure you filled in all the blanks before you hit submit.</strong>
				<input type="submit">

			</div>
			<!--survey for teachers -->
			<div id="school_relation" class="hidden">
				<br>
				<span class="question">Are you able to prove any following skillset of hers?</span>
				<select name="school_skill" id="school_skill">
					<option value="default">Select a Skill</option>
					<option value="HTML">HTML</option>
					<option value="CSS">CSS</option>
					<option value="Matlab">Matlab</option>
					<option value="Java">Java</option>
					<option value="Python">Python</option>
				</select>
				<br><br>
				<div id="school_rate" class="hidden">
					<span class="question">Please rate the level of her skillset, based on her performance in your class:</span><br>
					<input type="radio" id="school_rate_1" name="school_rate" value="1">
				  	<label for="school_rate_1">1  &nbsp;</label>
				  	<input type="radio" id="school_rate_2" name="school_rate" value="2">
				  	<label for="school_rate_2">2  &nbsp;</label>
				  	<input type="radio" id="school_rate_3" name="school_rate" value="3">
				  	<label for="school_rate_3">3  &nbsp;</label>
				  	<input type="radio" id="school_rate_4" name="school_rate" value="4">
				  	<label for="school_rate_4">4  &nbsp;</label>
				  	<input type="radio" id="school_rate_5" name="school_rate" value="5">
				  	<label for="school_rate_5">5  </label>

					<br><br>
					<span class="question">Your name:</span>
					<input type="text" name="school_name" maxlength="20">
					<span class="question">Your email:</span>
					<input type="text" name="school_email"><br><br>
					<strong style="color: blue;">Make sure you filled in all the blanks before you hit submit.</strong>
					<input type="submit">

				</div>


				

			</div>

			
			
		</form>
	</div>
	<script type="text/javascript">
		let relationBtn = document.getElementById('relationship');
		relationBtn.onchange = function(){
			let relation = relationBtn.value;
			changeDisplay(relation);
		}

		function changeDisplay(relation){
			if (relation == "friend_family") {
				document.getElementById('alarm_1').classList.add('hidden');
				document.getElementById('close_relation').classList.remove('hidden');
				document.getElementById('loose_relation').classList.add('hidden');
				document.getElementById('school_relation').classList.add('hidden');
				document.querySelector("#close_relation strong").style.color = "blue";
			}else if(relation == "teacher"){
				document.getElementById('alarm_1').classList.add('hidden');
				document.getElementById('close_relation').classList.add('hidden');
				document.getElementById('loose_relation').classList.add('hidden');
				document.getElementById('school_relation').classList.remove('hidden');
				document.querySelector("#school_relation strong").style.color = "blue";
			}
			else if(relation == "visitor"){
				document.getElementById('alarm_1').classList.add('hidden');
				document.getElementById('close_relation').classList.add('hidden');
				document.getElementById('loose_relation').classList.remove('hidden');
				document.getElementById('school_relation').classList.add('hidden');
				document.querySelector("#loose_relation strong").style.color = "blue";
			}else{
				document.getElementById('alarm_1').classList.remove('hidden');
				document.getElementById('close_relation').classList.add('hidden');
				document.getElementById('loose_relation').classList.add('hidden');
				document.getElementById('school_relation').classList.add('hidden');
			}
		}

		<?php
			if ($_GET["errorid"]=="friend_family") {
				?>
				document.getElementById('relationship').value = "friend_family";
				changeDisplay("friend_family");
				document.querySelector("#close_relation strong").style.color = "red";
				<?php

			}elseif ($_GET["errorid"]=="teacher") {
				?>
				document.getElementById('relationship').value = "teacher";
				changeDisplay("teacher");
				document.querySelector("#school_relation strong").style.color = "red";
				<?php

			}elseif ($_GET["errorid"]=="visitor") {
				?>
				document.getElementById('relationship').value = "visitor";
				changeDisplay("visitor");
				document.querySelector("#loose_relation strong").style.color = "red";
				<?php

			}

		?>


		let schoolSkillBtn = document.getElementById('school_skill');
		schoolSkillBtn.onchange = function(){
			let schoolSkillValue = schoolSkillBtn.value;
			if (schoolSkillValue != "default") {
				document.getElementById('school_rate').classList.remove('hidden');
			}else{
				document.getElementById('school_rate').classList.add('hidden');
			}
		}
	</script>
</body>
</html>