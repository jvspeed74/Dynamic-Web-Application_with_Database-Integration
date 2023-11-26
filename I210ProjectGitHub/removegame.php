<?php

/*
 * Author: your name
 * Date: today's date
 * File: removebook.php
 * Description: this script deletes a book from the database.
 *
 */

// Initial Page Requirements
$pageTitle = "Game Details";
require('includes/header.php');

// Connect to Database
connect();

// Retrieve and validate game id
$id = getValidation(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


// Execute query with statement
/** @var $tableGames */
runQuery("DELETE FROM $tableGames WHERE id=$id");

// Error clause
global $queryData;
if (!$queryData) {
    disconnect();
    raiseError("Deletion failed");
}

echo "<p>The book has been successfully deleted from the database.</p>";
disconnect();
require_once 'includes/footer.php';