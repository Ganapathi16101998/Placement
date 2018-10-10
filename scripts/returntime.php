<?php
	include 'config.php';
	$data = 0;
	$fetchtime = "SELECT * FROM timer";
	$fetchtimeEx = mysqli_query($con,$fetchtime);
	while($row = mysqli_fetch_array($fetchtimeEx)){
		$data = $row['min'];
	}
	echo $data;
?>