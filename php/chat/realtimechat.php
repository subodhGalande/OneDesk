<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<?php
include "connection.php";
session_start();

$fromUser = $_POST["postfrom"];
$toUser   = $_POST["postto"];
$output   = "";

$chats = mysqli_query($con, "SELECT * FROM queries where (from_user_id ='" . $fromUser . "' AND to_user_id ='" . $toUser . "') OR (from_user_id = '" . $toUser . "'  AND to_user_id= '" . $fromUser . "')")
  or die("Failed to query database" . mysqli_error());

while ($chat = mysqli_fetch_assoc($chats)) {
  if ($chat["from_user_id"] == $fromUser)

    $output .= /*'<article class="media is-flex-direction-column-reverse box"  >
      <div class="media-content">
    <div class="content">
      <p class="has-text-grey-dark has-text-weight-medium is-size-5">
      ' . $chat['text'] . '
      </p>
     </div>
    </div>
    <div class="media-right">
    <small class="has-text-right has-text-grey">' . $chat['time'] . '</small>
    </div >
 
</article>';*/


      '<li  class="has-text-weight-medium box " style="list-style-type:none;width:70%;float:right;position:relative"><p class="has-text-weight-medium is-size-6 has-text-grey-dark ">' . $chat['text'] . '</p><div class="has-text-right has-text-grey"><small style="text-align:right;font-size:12px">' . $chat['time'] . '</small></div></li> ';




  else
    $output .= /*'<article class="media has-background-grey-dark is-flex-direction-column-reverse box"  >
     <div class="media-content">
    <div class="content">
      <p class="has-text-white has-text-weight-medium is-size-5">
      ' . $chat['text'] . '
      </p>
     </div>
    </div>
    <div class="media-right">
    <small class="has-text-right has-text-light">' . $chat['time'] . '</small>
    </div >
</article>';*/
      '<li class="has-background-grey-dark box"  style="list-style-type:none;width:70%;float:left;position:relative"><p class="has-text-weight-medium  has-text-white ">' . $chat['text'] . '</p> <div  class="has-text-light has-text-right is-size-6"><small style="text-align:right;font-size:12px">' . $chat['time'] . '</small></div></li> ';
}
echo $output;
