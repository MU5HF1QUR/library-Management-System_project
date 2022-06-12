<?php
  session_start();
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mushfiqur's Library</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
  </head>

  <body>
    <h1>Mushfiqur's Library Login</h1>
    <p style="text-align: center;">Login to borrow book</p>

    <div class="wrap">
      <form action="login.php" method="POST">
        <input type="email" class="searchTerm" name="email" placeholder="example@mail.com">
        <br>
        <br>
        <input type="password" class="searchTerm" name="pwd" placeholder="password">
        <br>
        <br>
        <button type="submit" name="submit" class="btn btn-success">Login</button>
      </form>

      <br>
      <br>
      <?php
        if (isset($_POST['submit'])) {
          @$email = $_POST['email'];
          @$password = $_POST['pwd'];

          $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'");
          $count = mysqli_num_rows($query);
          $row = $query->fetch_assoc();
          if($count == 1)
          {
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id']   = $row['user_id'];

            header("Location: borrow.php");
            
          }else
          {
              echo "somthing wrrong";
          }
        }
      ?>
    </div>

    <div class="showBooks">
      <h3>
        <a href="index.php" class="linkButton">Home</a>
        <a href="booklist.php" class="linkButton">Show All Books</a>
      </h3>
    </div>
  </body>
</html>