<?php
    include 'config.php';
    include 'stu_fun.php';
    session_start();
    $roll = strtoupper($_SESSION['ROLL']);
    $reg = strtoupper($_SESSION['REG']);
    $name = strtoupper($_SESSION['NAME']);
    $dept = strtoupper($_SESSION['CLASS']);
    $marks = 0;
    $total = 2 * sizeof($_SESSION['arr']);

        $response = responses();
        $responded = 2 * sizeof($response);
        for($i=0;$i<sizeof($_SESSION['arr']);$i++){
            $qn = "SELECT * FROM Answers WHERE aid IN (SELECT ansid FROM Questions WHERE qid='".$_SESSION['arr'][$i]."')";
            $qnEx = mysqli_query($con,$qn);
            while($row = mysqli_fetch_array($qnEx)){
                if($row['answer'] == $response[$i]){
                    $marks += 2;
                }
            }
        }
        if (isset($_COOKIE['minutes'])) {
                    unset($_COOKIE['minutes']);
                    setcookie('minutes', '', time() - 3600, '/');
        }
        if (isset($_COOKIE['seconds'])) {
                    unset($_COOKIE['seconds']);
                    setcookie('seconds', '', time() - 3600, '/');
        }

            for($i=0;$i<sizeof($_SESSION['arr']);$i++){
                if (isset($_COOKIE[$_SESSION['arr'][$i]])) {
                    unset($_COOKIE[$_SESSION['arr'][$i]]);
                    setcookie($_SESSION['arr'][$i], '', time() - 3600, '/');
                }
            }
            

            $register = "INSERT INTO stu_register(Rollno,Regno,Name,Dept,Responses,Marks,Total,TimeDate) VALUES('$roll','$reg','$name','$dept','$responded','$marks','$total',now())";
            $registerEx = mysqli_query($con,$register);
			echo '<script>
                    window.setTimeout(function(){window.location.href = "home.html";
                    },300);</script>';

?>