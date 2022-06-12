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
    <script src="search.js"></script>
  </head>
  <body>
    <h1>Mushfiqur's Library</h1>

    <div class="wrap">
      <div class="search">
       	<input type="text" class="searchTerm form-control" size="30" onkeyup="show_result(this.value)" placeholder="What are you looking for?">
      </div>
      <div id="live_search"></div>
    </div>

    <div class="showBooks">
      <h3>
        <a href="index.php" class="linkButton">Home</a>
        <a href="booklist.php" class="linkButton">Show All Books</a>
        <a href="borrow.php" class="linkButton">Borrowed Books</a>
        <?php
          if (isset($_SESSION['user_name'])) {
        ?>
        <a href="login.php" class="linkButton">Login</a>
        <?php
          } else {
            echo '<a href="logout.php" class="linkButton">Logout</a>';
          }
        ?>
      </h3>
    </div>
  </body>
</html>
