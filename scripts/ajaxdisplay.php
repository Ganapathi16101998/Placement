<?php
    function QuestionDisplay($qnno){
		include 'config.php';
		include 'stu_fun.php';
		session_start();
		$str = '';
        $dec = 1;
		$qn = "SELECT qn FROM Questions WHERE qid='".$qnno."'";
		$qnEx = mysqli_query($con,$qn);
		while($row = mysqli_fetch_array($qnEx)){
			$str =  $row['qn'];
		}	
		echo $str."<br/><br/>";
        
		echo '<script src="<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
		$opt = "SELECT * FROM Answers WHERE ansid='".$qnno."'";
		$optEx = mysqli_query($con,$opt);
        $key = array_search($qnno, $_SESSION['arr']);
		if(isset($_COOKIE[$qnno])){
            $a =  $_COOKIE[$qnno];
            $ar = array(1,2,3,4,5,6);
            $arr = explode("^",$a);
		if (in_array($arr[1], $ar)){
			$i = 0;
			while($r = mysqli_fetch_array($optEx)){
				$i++;
				if($i == $arr[1]){
					echo '<input type="radio" id="radioButton" name="'.$qnno.'" value="'.$r['answer'].'" checked>  '.$r['answer'].'  </input><br/>';
				}
				else{
				    echo '<input type="radio" id="radioButton" name="'.$qnno.'" value="'.$r['answer'].'">  '.$r['answer'].'  </input><br/>';
				}
			}
		}
    }
		else{
			while($r = mysqli_fetch_array($optEx)){
			echo '<input type="radio" id="radioButton" name="'.$qnno.'" value="'.$r['answer'].'">  '.$r['answer'].'  </input><br/>';
			}
		}

        
        $last = $_SESSION['arr'][sizeof($_SESSION['arr']) - $dec];
        $ke = $key + $dec;
        $ek = $ke - $dec;
        $offset = $key - $dec;
        
        if($last == $_SESSION['arr'][$key]){
            if(isset($_SESSION['arr'][$offset])){
        echo '<br/><div class="col-md-4"><button class="btn btn-success"  onclick="myFunction('.$_SESSION['arr'][$offset].','.$ek.');">Previous Question</button></div>';
        }
        echo '<div class="col-md-4"></div>';
        if(isset($_SESSION['arr'][$key])){
        echo '<div class="col-md-4"><button class="btn btn-success"  onclick="SUBMIT('.$_SESSION['arr'][$key].');">Finish Examination</button></div>';
        }
    }
    else{
            
            if(isset($_SESSION['arr'][$offset])){
        echo '<br/><div class="col-md-4"><button class="btn btn-success"  onclick="myFunction('.$_SESSION['arr'][$offset].','.$ek.');" align="right">Previous Question</button></div>';
        }
        echo '<div class="col-md-4"></div>';
        echo '<div class="col-md-4"><button class="btn btn-success" onclick="SaveNext('.$_SESSION['arr'][$key].','.$_SESSION['arr'][$ke].','.$ke.');" align="left">Next Question</button></div>';
        }
}
?>
<script>

	function SaveNext(btn,next,index){
    	var value;
        var flag = 0;
    	window.loop = -1;
    	var type = document.getElementsByName(btn);
        var numberOfChecked = $('input:radio').length;
        if(numberOfChecked == 4){
    		for(var i=0;i<5;i++){
    			window.loop++;
    			if(type[i].checked){
                        flag = 1;
                       setColor(btn,1);
                       value = type[i].value;
                       setButtonCookie(btn,value,window.loop,1);
                       break;
                }
    		}
        }
        else{
            for(var i=0;i<=5;i++){
                window.loop++;
                if(type[i].checked){
                        flag = 1;
                       setColor(btn,1);
                       value = type[i].value;
                       setButtonCookie(btn,value,window.loop,1);
                       break;
                }
            }
        }
        if(!flag){
            setColor(btn,0);
        }

    	myFunction(next,index+1);
    }

    var count = 1;

    function setColor(btn,flag) {
        var property = document.getElementById(btn);
            if(flag){
                property.style.backgroundColor = "#7FFF00"
            }
            else{
               property.style.backgroundColor = "#FF0000" 
            }
            
    }

    

    
    function SUBMIT(btn){
    	var value;
        setColor(btn,1);
        flag = 0;
    	var type = document.getElementsByName(btn);
        var numberOfChecked = $('input:radio').length;
        if(numberOfChecked == 4){
    		for(var i=0;i<5;i++){
    			if(type[i].checked){
                        flag = 1;
                       value = type[i].value;
                       setButtonCookie(btn,value,window.loop,1);
                }

    		}
        }
        else{
            for(var i=0;i<=5;i++){
                if(type[i].checked){
                        flag = 1;
                       value = type[i].value;
                       setButtonCookie(btn,value,window.loop,1);
                }

            }
        }
            if(!flag){
            setColor(btn,0);
            }
                   	$.ajax({
                    url: "submit.php",
                    success: function(result){
                        $(".result").html(result);;
                     }});
        openTab(event, 'reading');
        
    }

    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    	return "";
	}

    function setButtonCookie(cname,cvalue,c1value,exdays) {
    	var separator = "^" ;
		var values = [cvalue, c1value].join(separator);
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + values + ";" + expires + ";path=/";
	} 
</script>
