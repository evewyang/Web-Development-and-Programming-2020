<?php
	//get admin logs
	$admin_logs = file_get_contents($path."/admin_log.txt");
	$admin_logs = trim($admin_logs);
	$admin_logs_split = explode("\n", $admin_logs);
	foreach ($admin_logs_split as $key => $value) {
		$admin_logs_split[$key] = explode("|", $admin_logs_split[$key]);
	}
?>