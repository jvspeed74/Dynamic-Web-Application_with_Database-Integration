<?php
/**
 * Author: Jalen Vaughn
 * Date: 11/12/23
 * File: database.php
 * Description: Procedural-style functions for handling MySQL database interactions.
 */

// Database connection properties
$connection = null;
$queryData = null;
$tableGames = 'games';
$tableEsrbs = 'esrbs';
$tableGenres = 'genres';
$tablePublishers = 'publishers';
$tableDevelopers = 'developers';

/**
 * Connect to the database.
 * @param string $dbHost Database host.
 * @param string $dbUser Database username.
 * @param string $dbPassword Database password.
 * @param string $dbName Database name.
 */
function connect($dbHost = 'localhost', $dbUser = 'phpuser', $dbPassword = 'phpuser', $dbName = 'videogame_db')
{
    global $connection;

    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check for connection errors
    if ($connection->connect_error) {
        raiseError("There was an error connecting to the database.");
    }
}

/**
 * Run a SQL query.
 * @param string $sql_statement SQL query statement.
 * @return mixed Query result.
 */
function runQuery($sql_statement)
{
    global $connection, $queryData;

    $queryData = $connection->query($sql_statement);

    return $queryData;
}

/**
 * Fetch data from the query result.
 * @return array Fetched rows.
 */
function fetchData()
{
    global $queryData;
    if (!$queryData) {
        raiseError("There was an error fetching data from the query.");
    }

    $rows = array();

    // Fetch data and store in an array
    while ($row = $queryData->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

/**
 * Close the database connection.
 * @return void
 */
function disconnect()
{
    global $connection;
    $connection->close();
}

/**
 * Raises errors and terminates the script.
 * @param string $error_string Error message that gets displayed.
 * @return void
 */
function raiseError($error_string)
{
    header("Location: error.php?m$error_string");
    die();
}

/**
 * Search for games based on a search term.
 * @param string $searchTerm Search term.
 * @return array Search results.
 */
function searchGames($searchTerm)
{
    global $tableGames;

    // SQL statement
    $sql = "SELECT id, title, genre, esrb, price FROM $tableGames WHERE ";

    // Split search terms
    $terms = explode(' ', $searchTerm);

    foreach ($terms as $t) {
        $sql .= "title LIKE '%$t%' AND ";
    }

    $sql = rtrim($sql, 'AND ');

    // Run the query
    runQuery($sql);

    // Fetch and return the results
    return fetchData();
}

/**
 * Runs a query on the item IDs found in the cart.
 * @param string $sql_statement SQL query statement.
 * @return mixed Query result.
 */
function findItems($sql_statement)
{
    global $cart;
    if (!is_array($cart))
        raiseError("There was an error initializing the cart correctly.");

    foreach (array_keys($cart) as $id) {
        $sql_statement .= " OR id=$id";
    }

    return runQuery($sql_statement);
}

/**
 * Checks session status and initiates a session if there is not one already active.
 * @return void
 */
function checkSession()
{
    if (session_status() == PHP_SESSION_NONE)
        session_start();
}

/**
 * Perform input validation.
 * @param int $input_type Input type (INPUT_GET || INPUT_POST).
 * @param string $var_name Variable name.
 * @param int|null $filter Filter type (FILTER_SANITIZE_(STRING || NUMBER_INT || null).
 * @return mixed Validated input.
 */
function getValidation($input_type, $var_name, $filter = null)
{
    // Check if the variable exists
    if (!filter_has_var($input_type, $var_name)) {
        raiseError("There was an error retrieving page identification");

    }

    // Check for what type of filter to use
    switch ($filter) {
        case null:
            $output = filter_input($input_type, $var_name);
            break;
        case FILTER_SANITIZE_STRING:
        case FILTER_SANITIZE_NUMBER_INT:
            $output = filter_input($input_type, $var_name, $filter);
            break;
        default:
            raiseError("There was an error specifying filter to use for validation.");
    }

    return $output;
}

