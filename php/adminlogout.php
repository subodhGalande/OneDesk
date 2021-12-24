<?php

session_start();

unset($_SESSION['adminauth']);
header('Location:../HTML/adminlogin.html');
