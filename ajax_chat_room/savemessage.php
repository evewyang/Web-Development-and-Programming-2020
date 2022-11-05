<?php
	//define a path to folder
	include('config.php');

	//receive a message from the client 
	$name = $_POST['name'];
	$message = $_POST['message'];
	$room = $_POST['room'];

	//evaluate the message se if there contains a sensative word(s)
	$filterAll = file_get_contents($path."/filter.txt");
	$filterAll = trim($filterAll);
	$filter = explode("\n", $filterAll);
	foreach ($filter as $key => $value) {
		//found the sensative word
		if(stripos($message, $filter[$key]) !== false){
			//error and exit
			print("error");
			exit();
		}
	}

	//store a message in the data file
	$file_name = $path."/".$room;
	file_put_contents($file_name, $name.": ".$message."\n",FILE_APPEND);

	//tell the client that we are done  
	print("success");
	exit();

?>