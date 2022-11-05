<?php
	//this php program mainly deal with the arithmatics of like&dislike clicks
	//and save the clicking history(IP,Time)

	//define the file path
	include('config.php');
	$file = $path."/like_dislike.txt";
	$favor = $_GET['favor'];
	
	$data = file_get_contents($file);
	$data_split = explode("\n", $data);
	foreach ($data_split as $key => $value) {
		$data_split[$key] = explode(":", $data_split[$key]);
	}
	//get the time
	$time = time();
	if($_COOKIE['favor']){
		//already clicked
		if ($_COOKIE['favor']=='dislike' && $favor == 'like') {
			//if click "like" while cookie is dislike
			//like + 1; dislike - 1
			$data_split[0][1] += 1;
			$data_split[1][1] -= 1;
			//write to like_history.txt
			$track = $_SERVER['REMOTE_ADDR']."|".$time."\n";
			file_put_contents($path."/like_history.txt",$track,FILE_APPEND);
		}elseif ($_COOKIE['favor']=='like' && $favor == 'dislike') {
			//elseif click "dislike" while cookie is like
			//like - 1; dislike + 1
			$data_split[0][1] -= 1;
			$data_split[1][1] += 1;
			//write to dislike_history.txt
			$track = $_SERVER['REMOTE_ADDR']."|".$time."\n";
			file_put_contents($path."/dislike_history.txt",$track,FILE_APPEND);
		}	
	}else{
		//first time click; no cookie
		if ($favor == 'like') {
			$data_split[0][1] += 1;
			//write to like_history.txt
			$track = $_SERVER['REMOTE_ADDR']."|".$time."\n";
			file_put_contents($path."/like_history.txt",$track,FILE_APPEND);
		}elseif ($favor == 'dislike'){
			$data_split[1][1] += 1;
			//write to dislike_history.txt
			$track = $_SERVER['REMOTE_ADDR']."|".$time."\n";
			file_put_contents($path."/dislike_history.txt",$track,FILE_APPEND);
		}
	}
	//rewrite/set new cookie
	setcookie('favor', $favor);
	//rewrite file
	file_put_contents($file, $data_split[0][0].":".$data_split[0][1]."\n".$data_split[1][0].":".$data_split[1][1]);
	exit();
?>