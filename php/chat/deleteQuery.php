<?php
include "connection.php";
session_start();


$fromUserId = $_SESSION['userid'];
$toUserId = $_SESSION['toUser'];


$delete = mysqli_query($con, "DELETE  from queries where (from_user_id='$fromUserId' AND to_user_id='$toUserId')  ");
$delete1 = mysqli_query($con, "DELETE  from queries where (from_user_id='$toUserId' AND to_user_id='$fromUserId')  ");

if ($delete) {

    header("Location:../studentdashboard.php");
}
