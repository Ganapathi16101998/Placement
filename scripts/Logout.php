<?php
session_start();
$_SESSION['status']="Closed";
session_destroy(); 

header('Location:../index.html');

?>