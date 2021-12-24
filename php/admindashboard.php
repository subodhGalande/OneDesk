<?php include "../auth/adminauth.php";
include "../php/connection.php";



// Display result 


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin dashboard</title>
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
        <p class="has-text-weight-bold is-size-4 pr-1">Admin</p>
        <p class="has-text-weight-thin is-size-4">Dashboard<p class="is-size-4"></p>
        </p>
      </p>
    </div>
    <div class="level-right">
      <p class="level-item has-text-centered">
        <a class="link is-info"></a>
      </p>
      <p class="level-item has-text-centered">

      </p>
      <a href="adminlogout.php" class=" button has-text-weight-semibold is-primary">Log out</a>

      </p>
    </div>
  </nav>

  <div class="section">
    <div class="container">

      <div class="columns is-centered">
        <div class="column is-9 is-centered">
          <p class="is-family-primary has-text-weight-light  is-size-1 has-text-centered ">Welcome! <span class="is-family-primary has-text-weight-bold  is-size-1 has-text-centered ">Admin</span>
          </p>
          <br>
          <br>
          </p>
          <p class="is-family-monospace has-text-weight-medium has-text-grey is-size-3 mt-2">Queries</p>



          <br>


          <?php



          $fetch_user = mysqli_query($con, "SELECT DISTINCT  users.username, users.user_id
          FROM users
          INNER JOIN queries ON users.user_id = queries.from_user_id where users.role='student'");
          $count = mysqli_num_rows($fetch_user);



          while ($row = mysqli_fetch_assoc($fetch_user)) {

            echo '<article class="media box"> 

            <div class="media-left mt-2">
            <p class="has-text-weight-bold is-size-5 has-text-grey-dark">' . ucfirst($row["username"]) . '</p>
            </div>
            <div class="media-content">
            
            </div>
            <div class="media-right">
            <a href="chat/ChatBox.php?toUser=' . $row["user_id"] . '" class="button is-rounded has-text-weight-semibold is-primary is-outlined">Reply</a>
            </div>
                    
              </article>';
          }

          ?>





        </div>



      </div>
    </div>
  </div>
  </div>







</body>

</html>