<?php
/**
 * Author: your name
 * Date: today's date
 * File: deletebook.php
 * Description: This script confirms deletion of book.
 */
$page_title = "Confirm Book Deletion";
require_once('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM $tblBook, $tblCategory WHERE books.category_id = categories.category_id AND id=$id";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Book not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>

    <h2>Book Details</h2>
    <div class="bookdetails">
        <div class="cover">
            <!-- display book image -->
            <img src="<?= $row['image'] ?>">
        </div>
        <div class="label">
            <!-- display book attributes  -->
            <div>Title:</div>
            <div>Author:</div>
            <div>Category</div>
            <div>ISBN:</div>
            <div>Date:</div>
            <div>Publisher:</div>
            <div>Price:</div>
            <div>Description</div>
        </div>

        <div class="content">
            <!-- display book details -->
            <div><?= $row['title'] ?></div>
            <div><?= $row['author'] ?></div>
            <div><?= $row['category'] ?></div>
            <div><?= $row['isbn'] ?></div>
            <div><?= $row['publish_date'] ?></div>
            <div><?= $row['publisher'] ?></div>
            <div>$<?= $row['price'] ?></div>
            <div><?= $row['description'] ?></div>
        </div>
    </div>
    <div class="bookstore-button">
        <input type="button" value="Delete"
               onclick="window.location.href = 'removebook.php?id=<?= $id ?>'">
        <input type="button" value="Cancel"
               onclick="window.location.href = 'bookdetails.php?id=<?= $id ?>'">
        <div style="color: red; display: inline-block;">Are you sure you want to delete the book?</div>
    </div>
<?php
require_once('includes/footer.php');
