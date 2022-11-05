<?php
	include("config.php");
	$file = $path."/filter.txt";

	//get the changed filter from admin.php
	$newfilter = $_POST['filter'];
	$newfilter = trim($newfilter);
	//split filter
	$newfilter_split = explode(",", $newfilter);
	//rewrite the filter
	file_put_contents($file, "");
	foreach ($newfilter_split as  $key => $value) {
		file_put_contents($file, $newfilter_split[$key]."\n", FILE_APPEND);
	}
	header("Location:admin.php");
	exit();
?>