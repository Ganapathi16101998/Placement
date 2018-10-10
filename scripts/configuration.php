
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database="placement";

$conn = new mysqli($servername, $username, $password,$database);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>