<html>
<head>
	<style type="text/css">
		#rank tr:nth-child(even){
			background-color: #f2f2f2;
		}
		#rank tr:nth-child(odd){
			background-color: #7298ff;
		}
		#rank td, #rank th,{
			border: 1px solid #ddd;
    		padding: 8px;
		}
		#rank tr:hover{
			background-color: #ddd;
		}
		b{
			font-size: 50px;
			font-family: Garamond;
			color: #f7feb2;
		}
	</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="images/bg.jpg">
	<center><br/><img src="images/logo.png"/><br>
		<img width="500" src="images/lb.png"/>
	</center><br>
	<div class="container">
		<?php
		include 'config.php';
		$qz = "SELECT * FROM leaderboard";
        $result = mysqli_query($con,$qz);
        $rowcount=mysqli_num_rows($result);
		if($rowcount > 0){
		  echo '<table id="rank" class="table table-stripped">
          <tr> <th> Ranking </th> 
          <th> 	Name </th><th> Overall Score </th>
          <th> 	Year </th> </tr>';
          $ct = "SELECT * FROM leaderboard";
          $ctEx = mysqli_query($con,$ct);
          $ctcount = mysqli_num_rows($ctEx);
          	echo '<tr>';
          	while($row = mysqli_fetch_array($ctEx)){
          		echo '<tr><td>'.$row['rank'].'</td>';
          		echo '<td>'.$row['username'].'</td>';
          		echo '<td>'.$row['score'].'</td>';
          		echo '<td>'.$row['year'].'</td></tr>';
          	}
		echo '</table>';	
	}
	?>
</div>
</body>
</html>