<?php
  session_start();
  $_SESSION['ROLL'] = $_GET['rollno'];
  $_SESSION['REG'] = $_GET['regno'];
  $_SESSION['NAME'] = $_GET['Name'];
  $_SESSION['CLASS'] = $_GET['dept'];
  $_SESSION['status']="Active";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <title>Language Lab | Quiz</title>
   <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/quizdescss.css">
   </head>
 <body>
    <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <center><img src="../images/tce_logo.png" width="600"></center>
    <div class="navbar-header">
    </div>
  </div>
</nav>  
<br/><br/>
<div class="row">
  <div class="col-md-12">
    <div class="grid">
      <div id="quiz">
            <h1>INSTRUCTIONS</h1>
            <hr style="margin-bottom: 20px">
            <ul style="font-size:20px">
              <li>This quiz consists of X questions</li>
              <li>Each question in the quiz is of multiple-choice or "true or false" format. Read each question carefully, and click on the button next to your response</li>
              <li>Review All of Your Answers Before Submitting the Quiz.</li>
              <li> Check Your Browser Options before the Test to ensure that it is not set to disconnect after several minutes of inactivity.</li>
              <li>To start, click the "Take the Quiz" button. When finished, click the "Submit Quiz" button.</li>
            </ul>

            <div class="col-md-11" >
              <form action="quiz.php">
            <button id="btn"  name="take_quiz">Take the Quiz</button>
          </form>
          </div>
      </div>
      
  </div>
</div>
</body>
</html>