<?php

	function unserialise($qnno){
	include 'config.php';
	$sql_query = "SELECT testqn FROM Test where testid='".$qnno."'" ;
	$result = mysqli_query($con,$sql_query); 
	    while ($row = mysqli_fetch_array($result)) {
	        $array = unserialize($row['testqn']);
	        return $array;
	    }
	}
	
	function serialise($array){
		$array_string = (serialize($array));
		return $array_string;
	}

	function Selectdept(){
		include 'config.php';
		$sql = "SELECT testid FROM Test WHERE current='1'";
		$result = mysqli_query($con,$sql);
		$qnno = 0;
		while($row = mysqli_fetch_array($result)){
			$qnno = $row['testid'];
		}
		$array = unserialise($qnno);
		shuffle($array);
		$_SESSION['arr'] = $array;
	}
	function displayButton(){
		include 'config.php';
		for($i=0,$j=1; $i < sizeof($_SESSION['arr']); $j++,$i++){
			
			echo '<button  id="'.$_SESSION['arr'][$i].'" name="'.$_SESSION['arr'][$i].'" onclick="myFunction('.$_SESSION['arr'][$i].','.$j.');" value="'.$_SESSION['arr'][$i].'"><h4>'.$j.'</h4></button>'.' &nbsp;';
		}
	}
	function responses(){
		$response = array();
    		for($i=0;$i < sizeof($_SESSION['arr']);$i++){
			if(isset($_COOKIE[$_SESSION['arr'][$i]])){
			$temp = $_COOKIE[$_SESSION['arr'][$i]];
			$temp = explode('^', $temp);
			array_push($response,$temp[0]);
			}
		}
		return $response;
    }
?>