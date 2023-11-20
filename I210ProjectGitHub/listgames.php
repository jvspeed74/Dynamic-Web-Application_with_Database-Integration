<?php
/**
 * Author: Jalen Vaughn
 *  Date: 11/15/23
 * File: listbooks.php
 * Description: this script lists all books from the books table.
 *
 */
// Initial Page Requirements
$pageTitle = "Video Games in Our Store";
include 'includes/header.php';
require "includes/database.php";

// Define $db as Class Database
$db = new Database();

// Query SQL statement that selects all from games table
$db->runQuery("SELECT * FROM $db->tableGames");

// Retrieve Data in $rows : array
$rows = $db->fetchData();


?>
    <section>
        <h2>Games in our store</h2>
        <div>
            <table>
                <tr>
                    <td>Title</td>
                    <td>Genre</td>
                    <td>ESRB</td>
                    <td>Price</td>
                </tr>
                <!-- PHP code to list all games from the "games" table -->
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><a href="gamedetails.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></td>
                        <td><?= $row['genre'] ?></td>
                        <td><?= $row['esrb'] ?></td>
                        <td><?= $row['price'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
<?php
$db->close();
include 'includes/footer.php';