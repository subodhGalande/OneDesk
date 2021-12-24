<?php

session_start();

unset($_SESSION['studentauth']);
header('Location:../HTML/studentlogin.html');
