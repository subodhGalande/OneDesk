<?php

session_start();

if (!isset($_SESSION['adminauth'])) {


    header('Location:../HTML/adminlogin.html');
}
