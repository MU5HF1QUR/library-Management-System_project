<?php
	include "connection.php";

	if (isset($_GET['q'])) {

		$result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_name` LIKE '%".$_GET['q']."%'");

		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>
	<a href="book.php?id=<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></a> <br/>
<?php
		}
		} else {
		    echo "No books found!";
		}
	}
 
	$conn->close();

?>
