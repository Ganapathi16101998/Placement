<html>
<head lang="en">
    <title>Redirecting...</title>
   <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="timer.js"></script>
    <link rel="stylesheet" href="../css/quiz.css">
    
   </head>
<body>
	    <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <center><img src="../images/tce_logo.png" width="500"></center>
    <div class="navbar-header">
    </div>
  </div>
</nav>
<br><br><br><br><hr/>
	<center>
		<div style="font-family:Times New Roman;">
		<h1>YOUR RESPONSES ARE STORED</h1>
		<h2>YOU SHALL LEAVE THE HALL </h2>
		<h2>THANK YOU!</h2>
		<br>
	</div>
	</center>
	</body>
</html>
<script>    
window.onload = function () {
	localStorage.removeItem('Minutes'); 
	localStorage.removeItem('Seconds'); 
	window.setTimeout(function(){window.location.href = "../index.html";},3000);
}
</script>  