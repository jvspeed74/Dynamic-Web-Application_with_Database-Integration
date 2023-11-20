<?php
/**
 * Author: Jalen Vaughn
 * Date: 11/15/23
 * Name: searchbook.php
 * Description: This script displays a search form.
 */
$pageTable = "Search Game";

include('includes/header.php');
?>
    <section>
        <h2>Search Games by Title</h2>
        <p>Enter one or more words in game title.</p>
        <form action="searchresults.php" method="get">
            <input type="text" name="q" size="40" required/>&nbsp;&nbsp;
            <input type="submit" name="Submit" id="Submit" value="Search Game"/>
        </form>
    </section>
<?php
include('includes/footer.php');