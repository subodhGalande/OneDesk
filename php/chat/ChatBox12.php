 <?php

  session_start();
  include "../connection.php";

  $SessionUserId = $_SESSION["userid"];

  $users = mysqli_query($con, "SELECT * FROM users WHERE user_id='$SessionUserId'");


  //$_SESSION['toUsername'] = $toUsername_run['username'];

  $user = mysqli_fetch_assoc($users);

  $getToUserid = $_GET['toUser'];

  $_SESSION["toUser"] = $_GET['toUser'];

  $SessionToUserId = $_SESSION["toUser"];


  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>


   <title>Chat Box</title>
   <link rel="stylesheet" href="UImain.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

 <body>
   <?php echo '<input type="text" value=' . $_SESSION["userid"]
      . ' id="fromUser" hidden />'; ?>




   <div class="modal is-active">
     <div class="modal-background"></div>
     <div class="modal-card">
       <header class="modal-card-head">
         <p class="modal-card-title">

           <?php

            if (isset($_GET['toUser'])) {

              $userName = mysqli_query($con, "SELECT * FROM users WHERE user_id='$getToUserid' ");
              $uName = mysqli_fetch_assoc($userName);
              echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden />';

              echo  '<span style="font-kerning=normal" class=" is-size-3 has-text-left is-family-monospace has-text-primary" >' . ucfirst($uName['username']) . '  </span>';
            } else {
              $userName = mysqli_query($con, "SELECT * FROM users");
              $uName = mysqli_fetch_assoc($userName);
              $_SESSION["toUser"] = $uName["user_id"];
              echo '<input type="text" value= ' . $_SESSION["toUser"] . ' id="toUser" hidden />';
              echo $uName["username"];
            }


            ?>

         </p>

       </header>
       <section class="modal-card-body" id="msgBody">

         <!-- Content ... -->

         <?php

          if (isset($_GET['toUser']))
            $chats = mysqli_query($con, "SELECT * FROM queries where (from_user_id ='$SessionUserId' AND to_user_id = '$getToUserid' ) ");

          else {
            $chats = mysqli_query($con, "SELECT * FROM queries where (from_user_id ='$SessionUserId' AND to_user_id = '$SessionToUserId' )  ");
          }

          while ($chat = mysqli_fetch_assoc($chats)) {
            if ($chat["from_user_id"] == $_SESSION["userid"])

              echo '<article class="media has-background-white-ter box">
            <div class="media-left">
              <p class="has-text-weight-bold has-text-grey mt-1">You:</p>
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
              echo '<article class="media has-background-grey-dark box">
            <div class="media-left">
              <p class="has-text-weight-bold has-text-light mt-1">' .
                ucfirst($uName["username"]) . ':</p>
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

          ?>

       </section>
       <footer class="modal-card-foot">

         <div class="control">
           <textarea id="message" name="message" required class="textarea" cols="70" rows="2"></textarea>
         </div>
         <button type="submit" class="button ml-3 is-rounded is-primary" id="send">
           <i class="fa fa-arrow-right"></i>

         </button>
         <div id="show"></div>

       </footer>
     </div>
   </div>


   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>


   <script>
     $(document).ready(function() {


       $("#send").on("click", function() {

         $.ajax({
           url: "insertmessage.php",
           method: "POST",
           data: {
             postfrom: $("#fromUser").val(),
             postto: $("#toUser").val(),
             postmsg: $("#message").val()
           },
           dataType: "text",
           success: function(data) {
             $("#message").val("");
           }
         });



       });
       setInterval(function() {

         $.ajax({
           url: "realtimechat.php",
           method: "POST",
           data: {
             postfrom: $('#fromUser').val(),
             postto: $('#toUser').val()
           },
           dataType: "text",
           success: function(data) {
             $("#msgBody").html(data);
           }
         });

       }, 100);

     });
   </script>

 </body>



 </html>