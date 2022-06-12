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
    <h1>Mushfiqur's Library</h1>
    <div class="wrap">
    	<?php
    		if (isset($_GET['id'])) {
    			$bookID = $_GET['id'];

    			$query = mysqli_query($conn, 'INSERT INTO `borrowed_books`(`borrow_book_id`, `book_id`, `user_id`, `issue_date`) VALUES (null, "'.$bookID.'", "'.$_SESSION['user_id'].'", "'.date('Y-m-d H:i:s').'")');

    			echo "Book borrowed successfully.";
    		}
    	?>


    	<table border="1">
			<th>ID</th>
			<th>Book Name</th>
			<th>Borrow By</th>
			<th>Issued Time</th>
			<?php
				$result = mysqli_query($conn, "SELECT b.*, bb.*, u.* FROM books b, borrowed_books bb, users u WHERE b.book_id=bb.book_id");

			  	if ($result->num_rows > 0) {
			    	while($row = $result->fetch_assoc()) {
			?>
			<tr>
				<td><?php echo $row["borrow_book_id"]; ?></td>
				<td><?php echo $row["book_name"]; ?></td>
				<td><?php echo $row["user_name"]; ?></td>
				<td><?php echo $row["issue_date"]; ?></td>
			</tr>
			<?php
					}}
			?>
		</table>
    </div>

    <div class="showBooks">
      <h3>
        <a href="index.php" class="linkButton">Home</a>
        <a href="booklist.php" class="linkButton">Show All Books</a>
        <?php
          if (isset($_SESSION['user_name']) == '') {
        ?>
        <?php
          } else {
            echo '<a href="logout.php" class="linkButton">Logout</a>';
          }
        ?>
      </h3>
    </div>
  </body>
</html>