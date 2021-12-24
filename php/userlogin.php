<?php

session_start();

include "../php/connection.php";

$email = $_POST["email"];
$pass = md5($_POST["pass"]);

//getting email in session
$_SESSION['email'] = $email;

$query = "select * from users where email='$email' AND (password='$pass' AND role='student') ";
$res = mysqli_query($con, $query);
$count = mysqli_num_rows($res);
$row = mysqli_fetch_array($res);

if (isset($_POST['submit'])) {

    if ($count == 1) {

        $_SESSION['email'] = $email;
        $user = $_SESSION['email'];
        $get_user = "select * from users where email='$user'";
        $run_get_user = mysqli_query($con, $get_user);
        $get_user_row = mysqli_fetch_array($run_get_user);

        //get user name
        $username = $get_user_row['username'];
        $_SESSION['username'] = $username;

        //get user id
        $userid = $get_user_row['user_id'];
        $_SESSION['userid'] = $userid;

        echo "<script> window.open('studentdashboard.php?userid=$userid','_self')</script>";

        $session_id = session_id();
        $_SESSION['studentauth'] = $session_id;


        $role = $row["role"];

        if ($role == "student") {


            echo '<script type="text/JavaScript">  
     alert("login successfull"); 
     </script>';
            echo '<script type="text/Javascript">setTimeout(function () {    
        window.location.href = "../php/studentdashboard.php"; 
    },0) </script> ';
        } else {
            echo '<script type="text/JavaScript">  
    alert("Incorrect email or password"); 
    </script>';
            echo '<script type="text/Javascript">setTimeout(function () {    
       window.location.href = "../HTML/studentlogin.html"; 
   },0) </script> ';
        }
    } else {

        echo '<script type="text/JavaScript">  
     alert("Incorrect email or password"); 
     </script>';
        echo '<script type="text/Javascript">setTimeout(function () {    
        window.location.href = "../HTML/studentlogin.html"; 
    },0) </script> ';
    }
}
