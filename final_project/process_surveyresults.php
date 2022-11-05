<?php
	//path to data folder
	include("config.php");
	//path to results folder
	include("config1.php");

	$relationship = $_POST['relationship'];

	if ($relationship == 'teacher') {

		if ($_POST['school_rate']=='' || $_POST['school_name']=='' || $_POST['school_email']=='') {
			//if empty field
			header("Location: survey.php?errorid=teacher");
			exit();
		}else{
			$folder = $path1."/teacher/";
			$filename = "teacher_".uniqid().".txt";
			$school_skill = $_POST['school_skill'];
			$school_rate = $_POST['school_rate'];
			$school_name = $_POST['school_name'];
			$school_email = $_POST['school_email'];
			file_put_contents($folder.$filename, "Skill: ".$school_skill."\nRate: ".$school_rate."\nName: ".$school_name."\nEmail: ".$school_email);
			chmod($folder.$filename, 0755);
			file_put_contents($path."/skill_result.txt", $school_skill.",".$school_rate."\n",FILE_APPEND);
		}

	}elseif ($relationship == 'friend_family') {
		if ($_POST["close_comment"]=='' || $_POST["close_name"]=='' || $_POST["close_email"]=='' || ($_POST["close_character_1"]=='' && $_POST["close_character_2"]=='' && $_POST["close_character_3"]=='' && $_POST["close_character_4"]=='' && $_POST["close_character_5"]=='' && $_POST["close_character_6"]=='' && $_POST["close_character_7"]=='' && $_POST["close_character_8"]=='') ) {
			//if empty field
			header("Location: survey.php?errorid=friend_family");
			exit();
		}else{
			//define path
			$folder = $path1."/friends_and_family/";
			$filename = "close_".uniqid().".txt";
			$character = '';
			//make all selected characters into one string
			if($_POST["close_character_1"] != ''){
				$character = $character.$_POST["close_character_1"].",";
			}
			if($_POST["close_character_2"] != ''){
				$character = $character.$_POST["close_character_2"].",";
			}
			if($_POST["close_character_3"] != ''){
				$character = $character.$_POST["close_character_3"].",";
			}
			if($_POST["close_character_4"] != ''){
				$character = $character.$_POST["close_character_4"].",";
			}
			if($_POST["close_character_5"] != ''){
				$character = $character.$_POST["close_character_5"].",";
			}
			if($_POST["close_character_6"] != ''){
				$character = $character.$_POST["close_character_6"].",";
			}
			if($_POST["close_character_7"] != ''){
				$character = $character.$_POST["close_character_7"].",";
			}
			if($_POST["close_character_8"] != ''){
				$character = $character.$_POST["close_character_8"].",";
			}
			//get rid of the last ","
			$character = substr($character, 0 , -1);
			$close_comment = $_POST["close_comment"];
			$close_name = $_POST["close_name"];
			$close_email = $_POST["close_email"];
			//put in a new file
			file_put_contents($folder.$filename, "Character Selected: ".$character."\nComment: ".$close_comment."\nName: ".$close_name."\nEmail: ".$close_email);
			chmod($folder.$filename, 0755);
			
		}
		
	}elseif ($relationship == 'visitor') {
		if ($_POST["visitor_rate"]=='' || $_POST["visitor_comment"]=='') {
			//if empty field
			header("Location: survey.php?errorid=visitor");
			exit();
		}else{
			//define path
			$folder = $path1."/visitor/";
			$filename = "visitor_".uniqid().".txt";
			$visitor_rate = $_POST["visitor_rate"];
			$visitor_comment = $_POST["visitor_comment"];
			file_put_contents($folder.$filename, "Visitor rate: ".$visitor_rate."\nVisitor comment: ".$visitor_comment);
			chmod($folder.$filename, 0755);
		}
		
	}




	print("<h2 style='text-align:center;'>Thank you, your response has been recorded.<br> You will be redirected after 3 seconds...</h2>");
	header("refresh:3;url=survey.php?submit=success");
	exit();
?>