<?php
include 'configuration.php';
$user = "";
$pass = "";
if(isset($_POST['user'])){
$user = $_POST['user'];
}
if(isset($_POST['pw'])){
$pass = $_POST['pw'];
}
$qz = "SELECT * FROM students_info where username='".$user."' and password='".$pass."'" ;
$qz = str_replace("\'","",$qz);
      $result = $con->query($qz);
      $result = mysqli_query($con,$qz);
while($row = mysqli_fetch_array($result)){
	header('Location: home.html');
	exit();
}
header('Location: index.html');
        exit();
?>