<?php
	//get number of likes and dislikes
	$data = file_get_contents($path."/like_dislike.txt");
	$data_split = explode("\n", $data);
	foreach ($data_split as $key => $value) {
		$data_split[$key] = explode(":", $data_split[$key]);
	}
	//split like_history
	$like_history = file_get_contents($path."/like_history.txt");
	$like_history = trim($like_history);
	$like_history_split = explode("\n", $like_history);
	foreach ($like_history_split as $key => $value) {
		$like_history_split[$key] = explode("|", $like_history_split[$key]);
	}
	//split dislike_history
	$dislike_history = file_get_contents($path."/dislike_history.txt");
	$dislike_history = trim($dislike_history);
	$dislike_history_split = explode("\n", $dislike_history);
	foreach ($dislike_history_split as $key => $value) {
		$dislike_history_split[$key] = explode("|", $dislike_history_split[$key]);
	}
	//NOTE: number of history-items of likes/dislikes is not the same as the official number of likes/dislikes
	//NOTE: yet, number of items of game history is the same as number of visits of the game 

	//split game_history
	$game_history = file_get_contents($path."/game_visits.txt");
	$game_history = trim($game_history);
	$game_history_split = explode("\n", $game_history);
	foreach ($game_history_split as $key => $value) {
		$game_history_split[$key] = explode("|", $game_history_split[$key]);
	}
	
?>