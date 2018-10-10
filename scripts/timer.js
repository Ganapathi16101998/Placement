count = 1;
function myFunction(param1,param2) {
  if(param1 > 0 ){
    var property = document.getElementById(param1);
    if(property.style.backgroundColor != "#FF0000" && property.style.backgroundColor != "#7FFF00"){
    property.style.backgroundColor = "#FF0000" ;
    }
    document.getElementById("question").innerHTML = "Question: " + param2;
  $.ajax({
    url: "sendvalue.php", 
    data: "param1=" + param1,
    success: function(result){
        $(".result").html(result);;
    }});
  }
  count++;
}
function myStopFunction(t) {
        clearInterval(t);
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    tr = setInterval(myTimer, 1000);

    function myTimer() {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        localStorage.setItem('Minutes',minutes);
        localStorage.setItem('Seconds',seconds);
        --timer;
        if (timer < 0) {
            myStopFunction(tr);
            alert("Time is Out!");
            window.setTimeout(function(){window.location.href = "final.php";
        },1000);
        }
        
    }
}
function fetchtime(){
  var data = 0;
  $.ajax({
      url: "returntime.php",
      async: false,
      success: function(result){
          data = result;
          callback.call(data);
      }});
  return data;
}
window.onload = function () {

  document.getElementById('togglee').style.visibility = 'hidden';
    var min = fetchtime();
      var element = document.getElementById("time");
    var minutes_data = localStorage.getItem('Minutes');
   var seconds_data = localStorage.getItem('Seconds');
   var timer_amount = (60 * min); 
    if (!minutes_data || !seconds_data){
    }
    else{
      console.log(minutes_data+" minutes_data at start");
      console.log(seconds_data+" seconds_data at start");
      console.log(parseInt(minutes_data*60)+parseInt(seconds_data));
            timer_amount = parseInt(minutes_data*60)+parseInt(seconds_data)
    }

  var fiveMinutes = timer_amount,
      display = document.querySelector('#time');
        startTimer(fiveMinutes, display);

};

function terminate(){
        if(confirm("Do you want to Submit ?")){
                $.ajax({
                    url: "final.php",
                    success: function(result){
                        $(".result").html(result);;
                     }});
        }
        else{

        }
    }
