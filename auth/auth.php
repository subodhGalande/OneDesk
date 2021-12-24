<?php



session_start();





if (!isset($_SESSION['studentauth'])) {

    header('Location:../HTML/studentlogin.html');
}
