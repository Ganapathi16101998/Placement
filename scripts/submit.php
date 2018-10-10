<?php
	include 'config.php';
	include 'stu_fun.php';
	session_start();

	$flag = 1;
    
	for($i=0;$i < sizeof($_SESSION['arr']) ;$i++){
        //$key = array_search($_SESSION['arr'][$i], $_SESSION['arr']);

        if(! isset($_COOKIE[$_SESSION['arr'][$i]])){
            $flag = 0;
            //header('Location:quiz.php');
        }
    }
    if(!$flag){
    	echo '<script>alert("Some questions are unanswered!\nCheck before you Submit !\n(Unanswered are indicated in Red Buttons)");</script>';
    }
    else{
    	echo '<script>
            if(confirm("Do you want to Submit ?")){
                $.ajax({
                    url: "final.php",
                    success: function(result){
                        $(".result").html(result);;
                     }});
            }
            else{

            }
        </script>';
        
            //header("refresh:5;url=../index.html");
    }
?>