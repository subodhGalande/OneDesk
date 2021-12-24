<?php
include "../php/remote.php";
include "../php/connection.php";

if (isset($_POST['register'])) {

    $name =  $_POST['username'];
    $email =  $_POST['email'];
    $contact =  $_POST['contact'];
    $rollno =  $_POST['rollno'];
    $password =  md5($_POST['password']);



    $query = mysqli_query($con, "INSERT INTO users(username,contact,email,roll,password,role) VALUES('$name','$contact','$email','$rollno','$password','student')");
    $result = mysqli_query($con, $query);
}

if (!$result) {

    echo '<script type="text/JavaScript">  
     alert("registration successfull"); 
     </script>';

    echo '<script type="text/Javascript">setTimeout(function () {    
        window.location.href = "../HTML/studentlogin.html"; 
    },0) </script> ';
}
