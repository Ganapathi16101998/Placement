count = 1;

function setColor(btn) {
        var property = document.getElementsByName(btn);
            if(property.style.backgroundColor == "7FFF00"){}
              else{
                property.style.backgroundColor = "#FF0000"
              }
            
}

function myFunction(param1,param2){
  if(param1 > 0 ){
    document.getElementById("question").innerHTML = "Question: " + param2;
    setColor(param1);
  $.ajax({
    url: "sendvalue.php", 
    data: "param1=" + param1,
    success: function(result){
        $(".result").html(result);;
    }});
  }
  count++;
}
var minutes = 0;
var seconds = 0;
var timestamp = '';
var flag = 0;
function startTimer(duration, display) {
  var timer = duration,
      minutes, seconds;
  setInterval(function() {
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = minutes + ":" + seconds;

    setCookie("M", minutes.toString(), 1);
    setCookie("S", seconds.toString(), 1);
    if(getCookie("M") == "00"  && getCookie("S") == "01"){
      alert("Time is Out!");
              window.setTimeout(function(){window.location.href = "final.php";
              },50);
    }
    if (--timer < 0) {
      timer = 0;
    }
  }, 1000);
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
function submitFinal(){
  $.ajax({
  url: "submit.php",
  success: function(result){
      $(".result").html(result);;
   }});
}
window.onload = function() {
  
  document.getElementById('togglee').style.visibility = 'hidden';
  var min = 0;
    var d = new Date();
    min = fetchtime();
   var minutes_data = getCookie("M");
   var seconds_data = getCookie("S");
   var timer_amount = (60* min); //default
    if (!minutes_data || !seconds_data){
      //no cookie found use default
    }
    else{
      console.log(minutes_data+" minutes_data at start");
      console.log(seconds_data+" seconds_data at start");
      console.log(parseInt(minutes_data*60)+parseInt(seconds_data));
            timer_amount = parseInt(minutes_data*60)+parseInt(seconds_data)
    }

  var fiveMinutes = timer_amount,
      display = document.querySelector('#time');
        startTimer(fiveMinutes, display); //`enter code here`
};

 function setCookie(cname, cvalue, exdays) {
  var t = fetchtime();
  var expires='';
  if(flag == 0){
  var d = new Date();
  d.setTime(d.getTime() + (exdays*60000*t));
    timestamp = d.toUTCString();
    expires = "expires="+d.toUTCString();
    flag = 1;
  }
  else{
    expires = "expires="+timestamp;
    
  }
  
  document.cookie = cname + "=" + cvalue + "; " + expires;
 } 
 
 function getCookie(cname) {
 var name = cname + "=";
 var ca = document.cookie.split(';');
 for(var i=0; i<ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
 }
 return "";
}  
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