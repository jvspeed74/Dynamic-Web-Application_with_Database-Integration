<?php
/**
 * Description: This script confirms deletion of book.
 */
$pageTitle = "Confirm Game Deletion";
require_once('header.php');

// Connect to Database
connect();

// Retrieve and validate id sent in query string
$id = getValidation(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Execute query with statement
/** @var $tableGames */
$query = runQuery("SELECT * FROM $tableGames WHERE id=$id");

// Get data associated with query
$rows = fetchData($query);
?>
    <section>
        <h2>Game Details</h2>
        <table>
            <?php foreach ($rows as $row) { ?>
                <!-- Display Game image -->
                <tr>
                    <td colspan="2"><img src="<?= $row['image'] ?>" alt=""></td>
                </tr>

                <!-- Display Game Attributes -->
                <tr>
                    <td>Title:</td>
                    <td><?= $row['title'] ?></td>
                </tr>
                <tr>
                    <td>Developer:</td>
                    <td><?= $row['developer'] ?></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td><?= $row['genre'] ?></td>
                </tr>
                <tr>
                    <td>ESRB:</td>
                    <td><?= $row['esrb'] ?></td>
                </tr>
                <tr>
                    <td>Release Date:</td>
                    <td><?= $row['release_date'] ?></td>
                </tr>
                <tr>
                    <td>Publisher:</td>
                    <td><?= $row['publisher'] ?></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><?= $row['price'] ?></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><?= $row['description'] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                    <input type="button" onclick="window.location.href='removegame.php?id=<?= $id ?>';"
                           value="Delete"/>
                    <input type="button"
                           onclick="window.location.href='gamedetails.php?id=<?= $id ?>'"
                           value="Cancel">
                </td>
                <td>Are you sure you want to delete this game?
                </td>
            </tr>
        </table>
    </section>
<?php
require_once('footer.php');
