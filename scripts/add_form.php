<?php

    include 'configuration.php';
    $fname = ""; $lname = "";
    $email=""; $password="";
    $gender=""; $language="";
    $dob=""; $location="";
    if(isset($_POST['fname'])){
		$fname = $_POST['fname'];
    }
    if(isset($_POST['lname'])){
	$lname = $_POST['lname'];
	}
	if(isset($_POST['email'])){
	$email = $_POST['email'];
	}
	if(isset($_POST['Password'])){
	$password = $_POST['Password'];
	}
	if(isset($_POST['Gender'])){
	$gender = $_POST['Gender'];
	}
	if(isset($_POST['Programming_Languages'])){
	$language = $_POST['Programming_Languages'];
	}
	if(isset($_POST['dob'])){
	$dob = $_POST['dob'];
	}
	if(isset($_POST['Disticts'])){
	$location = $_POST['Disticts'];
	}
	$query = "INSERT INTO signup(first,last,email,password,dob,gender,language,location) VALUES('$fname','$lname','$email','$password','$dob','$gender','$language','$location')";
	$queryexec = mysqli_query($conn,$query);
?>