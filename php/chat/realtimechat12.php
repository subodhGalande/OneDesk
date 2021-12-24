<?php
include "connection.php";
session_start();

//getting toUsername





$fromUser = $_POST["postfrom"];
$toUser   = $_POST["postto"];
$output   = "";

$chats = mysqli_query($con, "SELECT * FROM queries where (from_user_id ='" . $fromUser . "' AND to_user_id ='" . $toUser . "') OR (from_user_id = '" . $toUser . "'  AND to_user_id= '" . $fromUser . "')")
  or die("Failed to query database" . mysqli_error());

while ($chat = mysqli_fetch_assoc($chats)) {
  if ($chat["from_user_id"] == $fromUser)

    $output .= '<article class="media has-background-white-ter box">
        <div class="media-left">
          <p class="has-text-weight-bold has-text-grey mt-1"></p>
        </div>
                <div class="media-content">
              <div class="content">
            <p class=" has-text-weight-medium is-size-5 has-text-grey-dark">' . $chat["text"] . '</p>

          </div>



        </div>
        <div class="media-right">
          <small class="has-text-grey">' . $chat['time'] . '</small>
        </div>
      </article>  ';

  else
    $output .= '<article class="media has-background-grey-dark box">
        <div class="media-left">
          <p class="has-text-weight-bold has-text-light mt-1"></p>
        </div>
                <div class="media-content">
              <div class="content">
            <p class=" has-text-weight-medium is-size-5 has-text-white">' . $chat["text"] . '</p>

          </div>



        </div>
        <div class="media-right">
          <small class="has-text-light">' . $chat['time'] . '</small>
        </div>
      </article>  ';
}
echo $output;
