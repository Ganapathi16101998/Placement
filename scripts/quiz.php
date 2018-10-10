<?php
    include 'config.php';
    include 'stu_fun.php';
    session_start();
    $_SESSION['ROLL'] = $_POST['rollno'];
    $_SESSION['REG'] = $_POST['regno'];
    $_SESSION['NAME'] = $_POST['Name'];
    $_SESSION['CLASS'] = $_POST['dept'];
    $_SESSION['COUNT'] = 0;
    $_SESSION['status']= "Active";
    
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <title>Language Lab | Quiz</title>
   <meta charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
 <script src="timer.js"></script>
    <link rel="stylesheet" href="../css/quiz.css">
    <link rel="stylesheet" href="../css/tabs.css">
    <link rel="stylesheet" href="css/mcq.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bg.css">
   </head>
 <body >
  <video autoplay muted loop id="myVideo">
  <source src="HD.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
  <div class="row">
    <div class="col-sm-12">
        <center><img src="images/logo.png" /> </center>
       </div>
    <div class="col-md-3">
      <div class="hect">
        <div style="font-size: 30px; color:white; font-family:Decorative;"><center>QUESTIONS</center></div>
        <div class="question" style="font-size: 25px; color:black; font-family:Decorative;">
          <?php 
                  Selectdept(); 
                  displayButton();
                  $first=(isset($_SESSION['arr'][0]))?$_SESSION['arr'][0]:''; 
          ?>
        </div>
        
        <div align="center" style="font-size: 25px; color:white; font-family:Decorative;">
          <div style="font-size: 40px; color:red; font-family:Decorative;">
          <div class="col-md-12"><h2 align="center"><span id="time" class="timer"><b></b></span></h2></div>
          
            <center><label>All the Best!</label></center>
            <button id="togglee" class="btn btn-danger"> Confirm </button>
          
        </div>
          <button class="btn btn-danger" >Flagged Questions</button>
          <form action="final.php" method="POST">
          <button class="btn btn-danger" onClick="action();">Quit this Quiz</button>
        
        </form>
        
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="rect">
        <br><br>
          <div class="qnframe" style="font-size: 40px; color:black; font-family:Decorative;">
            <div class="col-md-12">
                <div class="col-md-6"><b><h2 id="question"></h2></b></div>
               
             <div align="right">
            
            
            </div>
              <div class="scroll2" >
                  <div class="result"></div>
              </div>
          </div>
            
          </div>
    </div>
    <div class="col-md-2"></div>
  </div>
            <div class="scroll" style="overflow-y: scroll;"> 
                
              </div>
              
              
        </div>
    </div>
<br/><br/>
</body>
</html>
<script>
    var hidden = false;
    
    function action() {
        hidden = !hidden;
        if(hidden) {
            document.getElementById('togglee').style.visibility = 'hidden';
        } else {
            document.getElementById('togglee').style.visibility = 'visible';
        }
    }
</script>