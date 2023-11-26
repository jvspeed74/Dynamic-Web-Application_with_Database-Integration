<?php
/*
 * Author: your name
 * Date: today's date
 * File: addgame.php
 * Description: This script displays a form to accept a new book's details.
 *
 */
$page_title = "Game 'n Go: Add game";
require_once 'includes/header.php';
?>

    <h2>Add New Book</h2>
    <form action="insertgame.php" method="post">

        <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">

            <tr>
                <td style="text-align: right; width: 100px">Title:</td>
                <td><input name="title" type="text" size="50" required/></td>
            </tr>

            <tr>
                <td style="text-align: right">Genre:</td>
                <td>
                    <select name="genre">
                        <option value="1">Action-Adventure</option>
                        <option value="2">Action-Role Playing</option>
                        <option value="3">First-Person Shooter</option>
                        <option value="4">Life Simulation</option>
                        <option value="4">Sports</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align: right">Developer:</td>
                <td>
                    <select name="developer">
                        <option value="1">343 Industries</option>
                        <option value="2">CD Projekt Red</option>
                        <option value="3">EA Tiburon</option>
                        <option value="4">Nintendo EPD</option>
                        <option value="5">Rockstar Studios</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align: right">Publisher:</td>
                <td>
                    <select name="publisher">
                        <option value="1">CD Projekt</option>
                        <option value="2">EA Sports</option>
                        <option value="3">Nintendo</option>
                        <option value="4">Rockstar Games</option>
                        <option value="5">Xbox Game Studios</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align: right">Rating:</td>
                <td><input name="rating" type="number" required/></td>
            </tr>

            <tr>
                <td style="text-align: right">ESRB:</td>
                <td>
                    <select name="esrb">
                        <option value="1">Everyone</option>
                        <option value="2">Everyone 10+</option>
                        <option value="3">Mature 17+</option>
                        <option value="4">Rating Pending</option>
                        <option value="5">Teen</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align: right">Image:</td>
                <td><input name="image" type="text" size="100" required/></td>
            </tr>

            <tr>
                <td style="text-align: right">Release Date:</td>
                <td><input name="release_date" type="text" size="100" required/></td>
            </tr>

            <tr>
                <td style="text-align: right; vertical-align: top">Price:</td>
                <td><input name="price" type="number" step="0.01" required/></td>
            </tr>

            <tr>
                <td style="text-align: right; vertical-align: top">Description:</td>
                <td><textarea name="description" rows="6" cols="65"></textarea></td>
            </tr>

        </table>

        <div>
            <input type="submit" value="Add Game"/>
            <input type="button" value="Cancel" onclick="window.location.href='listgames.php'"/>
        </div>

    </form>

<?php
require_once 'includes/footer.php';