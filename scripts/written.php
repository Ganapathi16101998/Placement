<?php
	include 'config.php';
	$para = $_POST['writtenabl'];
	$AREx1 = "INSERT INTO essay(sno,user,year,para) VALUES('1','Vasanth','III','$para')";
	$ARExR1 = mysqli_query($con,$AREx1);
?>