<?php
include "../php/connection.php";
include "../auth/auth.php";


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <!-- Bulma Version 0.9.0-->
  <link rel="stylesheet" href="../css/UImain.css" />
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>

  <!-- START NAV -->


  <nav class="level mt-5 container">
    <div class="level-left">
      <p class="level-item has-text-centered">

        <img src="../assets/1x/Asset 1.png" style="height: 30px;" alt="">

      </p>
      <p class="is-size-3 has-text-grey">|</p>
      <p class="level-item">
        <p class="has-text-weight-bold is-size-4 pr-1">Student</p>
        <p class="has-text-weight-thin is-size-4">Dashboard<p class="is-size-4"></p>
        </p>
      </p>
    </div>
    <div class="level-right">
      <p class="level-item has-text-centered">
        <a class="link is-info"></a>
      </p>
      <p class="level-item has-text-centered">

        <a href="studentlogout.php" class=" button has-text-weight-semibold is-primary">Log out</a>

      </p>
    </div>
  </nav>

  <div class="section">
    <div class="container">

      <div class="columns is-centered">
        <div class="column is-9">




          <p class="is-family-primary has-text-weight-light  is-size-1 has-text-centered "><?php echo 'Welcome!' ?> <span class="px-2 has-text-centered mr-2 is-size-1 has-text-link has-text-weight-bold"> <?php echo ucfirst($_SESSION['username']);
                                                                                                                                                                                                            ?></span>
          </p>

          <br>
          <br>
          <div class="box has-background-white-ter">
            <br>
            <p class="is-family-primary has-text-weight-medium is-size-4 has-text-centered "> Select an option to generate or view your query </p>

            <br>
            <br>
            <?php

            $i = 1;

            $fetch_user = mysqli_query($con, " SELECT * from users WHERE role='admin'");
            $count = mysqli_num_rows($fetch_user);



            while ($row = mysqli_fetch_assoc($fetch_user)) {

              echo '<article class="media"> 

              <div class="media-left">
              
              </div>
            
            
            <div class="media-content has-text-centered">
            <a href="chat/ChatBox.php?toUser=' . $row["user_id"] . '" class="button is-rounded has-text-weight-semibold is-primary is-outlined">View/Generate Query</a>
            
            
            

            ';
            }

            ?>

            <a href="chat/deleteQuery.php" class="button ml-2 is-rounded has-text-weight-semibold is-primary is-outlined">Delete Query</a>
            <div class="media-right">

            </div>

            </article>
          </div>
        </div>






      </div>
    </div>
  </div>
  </div>







</body>

</html>