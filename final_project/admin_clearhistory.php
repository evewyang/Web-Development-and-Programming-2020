<?php
	$filename = $_POST['filename'];
	include ('config.php');
	file_put_contents($path."/".$filename, "");
	print('');
	exit();
?>