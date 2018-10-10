<?php
	include 'config.php';
	if(isset($_POST['submitreading'])){
			$checked_count = count($_POST['readingchoice']);
			echo $checked_count;
	}
?>
 