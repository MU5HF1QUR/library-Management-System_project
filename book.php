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
  	<table border="1">
		<th>ID</th>
		<th>Book Name</th>
		<th>Author Name</th>
		<th>Price</th>
		<th>Year</th>
		<th>Borrow Your Book</th>
	  	<?php 
	  	  if (isset($_GET['id'])) {
	$result = mysqli_query($conn, 'SELECT * FROM `books` INNER JOIN publisher on books.publisher_id=publisher.publisher_id WHERE `book_id`='.$_GET["id"]);

		  if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		?>
			<tr>
				<td><?php echo $row["book_id"]; ?></td>
				<td><?php echo $row["book_name"]; ?></td>
				<td><?php echo $row["author_name"]; ?></td>
				<td>$<?php echo $row["price"]; ?></td>
				<td><?php echo $row["year"]; ?></td>
				<td><a href="borrow.php?id=<?php echo $row["book_id"]; ?>"><button>Borrow</button></a></td>
			</tr>
		
		<?php
		    }
		}
		} else {
		    echo "0 results";
		}
		$conn->close();

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
