<html>
<head>
  <title>Essay Writing</title>
</head>
<link rel="stylesheet" type="text/css" href="head.css">
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
p{
   font-family:verdana; color:black; font-size:30px;
}
body{
  background-image: url("images/bg.jpg");
}
</style>
<body onload="topic()">
	<br/><center><img src="images/logo.png" width="900"></center>
	<div class="container">
		<div class="row">
           <div class="col-sm-6">
           	<br>
           	<img src="images/wriiten.png" alt="" height="150px" width="150px"/>
            <div>
              <br>
              <br>
              <img width="500" src="images/wa.png"/>
              <br>
              <br>
              <center><p style="font-size:20px color:white">Essay Writing</p></center>
            </div>
           </div>
           <div class="col-sm-6">
           	<br>
              <ul class="nav nav-pills">
								<li><a href="home.html">Menu</a></li>
								<li class ="active"><a href="essay.html">Essay writing</a></li>
								
              </ul>
                <br>
                <br>
                <h3>write an essay on the topic</h3>
                <br>
                <p id="demo" style="font-size:20px color:solid white "></p>
                <br>
                <p id="demo1" style="font-size:15px color:solid black "></p>
                <br>
                  <form action="written.php" method="POST">
                    <textarea name="writtenabl" rows="10" cols="80" required="250" minlength="50"></textarea>
                     <center><button type="button" class="btn btn-danger" >Submit</button></center>  <br><br>
                    </form>
                    <br>
                   
              </div>
            </div>
          </div>
        </body>
<script>
  function topic()
  {
  var topics=["Demonetisation-ur views","Trade war between countries","Indian cinema and world cinema - a comparison","India in World Sports","Favourite cricket player...?","Any Trending topic in your discipline"];
  var rand=Math.floor((Math.random()*6)+0);
  var ans = topics[rand];
  document.getElementById("demo").innerHTML = ans;
  }
var countDownDate = new Date("Jan 5, 2019 15:05:25").getTime();
var x = setInterval(function() {

    var now = new Date().getTime();
  
    var distance = countDownDate - now;
    
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("demo1").innerHTML = minutes + "m " + seconds + "s ";
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo1").innerHTML = "Time's up";
    }
}, 1000);

</script>
<body>
</html>

