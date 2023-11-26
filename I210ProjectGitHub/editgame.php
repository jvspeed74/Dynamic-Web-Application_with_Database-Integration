<?php
/**
 * Author: your name
 * Date: today's date
 * File: bookdetails.php
 *  Description: This script displays details of a particular book in a form.
 */
$pageTitle = "Edit Game Details";
require_once('includes/header.php');

// Get and validate query string variable "id"
$id = getValidation(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// Run query that selects the required id
/** @var $tableGames */
runQuery("SELECT * FROM $tableGames WHERE id=$id");

// Assign data to $row
$row = fetchData();
?>

    <section>
        <h2>Edit Game Details</h2>
        <form action="updategame.php" method="post">
            <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">

                <tr>
                    <td style="text-align: right; width: 100px">Title:</td>
                    <td><input name="title" value="<?php echo $row['title'] ?>" type="text" size="50" required/></td>
                </tr>

                <tr>
                    <td style="text-align: right">Genre:</td>
                    <td>
                        <select name="genre">
                            <option <?= $row['category'] == 'Action-Adventure' ? 'selected' : ''; ?>>Action-Adventure</option>
                            <option <?= $row['category'] == 'Action-Role Playing' ? 'selected' : ''; ?>>Action-Role Playing</option>
                            <option <?= $row['category'] == 'First-Person Shooter' ? 'selected' : ''; ?>>First-Person Shooter</option>
                            <option <?= $row['category'] == 'Life Simulation' ? 'selected' : ''; ?>>Life Simulation</option>
                            <option <?= $row['category'] == 'Sports' ? 'selected' : ''; ?>>Sports</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Developer:</td>
                    <td>
                        <select name="developer">
                            <option <?= $row['category'] == '343 Industries' ? 'selected' : ''; ?>>343 Industries</option>
                            <option <?= $row['category'] == 'CD Projekt Red' ? 'selected' : ''; ?>>CD Projekt Red</option>
                            <option <?= $row['category'] == 'EA Tiburon' ? 'selected' : ''; ?>>EA Tiburon</option>
                            <option <?= $row['category'] == 'Nintendo EPD' ? 'selected' : ''; ?>>Nintendo EPD</option>
                            <option <?= $row['category'] == 'Rockstar Studios' ? 'selected' : ''; ?>>Rockstar Studios</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Publisher:</td>
                    <td>
                        <select name="publisher">
                            <option <?= $row['category'] == 'CD Projekt' ? 'selected' : ''; ?>>CD Projekt</option>
                            <option <?= $row['category'] == 'EA Sports' ? 'selected' : ''; ?>>EA Sports</option>
                            <option <?= $row['category'] == 'Nintendo' ? 'selected' : ''; ?>>Nintendo</option>
                            <option <?= $row['category'] == 'Rockstar Games' ? 'selected' : ''; ?>>Rockstar Games</option>
                            <option <?= $row['category'] == 'Xbox Game Studios' ? 'selected' : ''; ?>>Xbox Game Studios</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Rating:</td>
                    <td><input name="rating" value="<?php echo $row['rating'] ?>" type="number" required/></td>
                </tr>

                <tr>
                    <td style="text-align: right">ESRB:</td>
                    <td>
                        <select name="esrb">
                            <option <?= $row['category'] == 'Everyone' ? 'selected' : ''; ?>>Everyone</option>
                            <option <?= $row['category'] == 'Everyone 10+' ? 'selected' : ''; ?>>Everyone 10+</option>
                            <option <?= $row['category'] == 'Mature 17+' ? 'selected' : ''; ?>>Mature 17+</option>
                            <option <?= $row['category'] == 'Rating Pending' ? 'selected' : ''; ?>>Rating Pending</option>
                            <option <?= $row['category'] == 'Teen' ? 'selected' : ''; ?>>Teen</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Image:</td>
                    <td><input name="image" value="<?php echo $row['image'] ?>" type="text" size="100" required/></td>
                </tr>

                <tr>
                    <td style="text-align: right">Release Date:</td>
                    <td><input name="release_date" value="<?php echo $row['release_date'] ?>" type="text" size="100" required/></td>
                </tr>

                <tr>
                    <td style="text-align: right; vertical-align: top">Price:</td>
                    <td><input name="price" value="<?php echo $row['price'] ?>" type="number" step="0.01" required/></td>
                </tr>

                <tr>
                    <td style="text-align: right; vertical-align: top">Description:</td>
                    <td><textarea name="description" rows="6" cols="65"><?php echo $row['description'] ?></textarea></td>
                </tr>

            </table>

            <div>
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="submit" value="Update"/>
                <input type="button" value="Cancel" onclick="window.location.href='listgames.php'"/>
            </div>
        </form>
    </section>
<?php
// close the connection.
disconnect();
require_once 'includes/footer.php';
