<?php
include 'connection.php';


$fromUser = $_POST["postfrom"];
$toUser   = $_POST["postto"];
$message  = $_POST["postmsg"];

$output = "";

$sql = mysqli_query($con, "INSERT INTO queries (from_user_id, to_user_id, text) VALUES ('$fromUser','$toUser','$message')");

if ($sql) {
	$output .= "";
} else {
	echo "false";
}

echo $output;
