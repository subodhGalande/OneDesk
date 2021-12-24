<?php

session_start();

include "../php/connection.php";

if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $pass = md5($_POST["pass"]);


    $query = "select * from users where email='$email' AND (password='$pass' AND role='admin') ";
    $res = mysqli_query($con, $query);

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if ($count == 1) {

        $_SESSION['email'] = $email;
        $user = $_SESSION['email'];
        $get_user = "select * from users where email='$user'";
        $run_get_user = mysqli_query($con, $get_user);
        $get_user_row = mysqli_fetch_array($run_get_user);

        $userid = $get_user_row['user_id'];
        $_SESSION['userid'] = $userid;

        echo "<script> window.open('admindashboard.php?userid=$userid','_self')</script>";

        $session_id = session_id();
        $_SESSION['adminauth'] = $session_id;

        $role = $row["role"];

        if ($role == "admin") {


            echo '<script type="text/JavaScript">  
     alert("login successfull"); 
     </script>';
            echo '<script type="text/Javascript">setTimeout(function () {    
        window.location.href = "../php/admindashboard.php"; 
    },0) </script> ';
        } else {
            echo '<script type="text/JavaScript">  
    alert("Incorrect email or password"); 
    </script>';
            echo '<script type="text/Javascript">setTimeout(function () {    
       window.location.href = "../HTML/adminlogin.html"; 
   },0) </script> ';
        }
    } else {

        echo '<script type="text/JavaScript">  
     alert("Incorrect email or password"); 
     </script>';
        echo '<script type="text/Javascript">setTimeout(function () {    
        window.location.href = "../HTML/adminlogin.html"; 
    },0) </script> ';
    }
}
