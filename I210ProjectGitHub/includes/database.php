<?php
/**
 * Author: Jalen Vaughn
 * Date: 11/12/23
 * File: database.php
 * Description: Database class for handling MySQL database interactions.
 */

class Database
{
    // Database connection properties
    protected $connection;
    protected $queryData;
    public $tableGames;
    public $tableEsrbs;
    public $tableGenres;
    public $tablePublishers;
    public $tableDevelopers;

    /**
     * Constructor: Initializes the class and establishes a database connection.
     * @param string $dbHost Database host.
     * @param string $dbUser Database username.
     * @param string $dbPassword Database password.
     * @param string $dbName Database name.
     */
    public function __construct(
        $dbHost = 'localhost',
        $dbUser = 'phpuser',
        $dbPassword = 'phpuser',
        $dbName = 'videogame_db'
    )
    {
        // Set default table names
        $this->tableGames = 'games';
        $this->tableEsrbs = 'esrbs';
        $this->tableGenres = 'genres';
        $this->tablePublishers = 'publishers';
        $this->tableDevelopers = 'developers';

        // Establish a database connection
        $this->connect($dbHost, $dbUser, $dbPassword, $dbName);
    }

    /**
     * Connect to the database.
     * @param string $dbHost Database host.
     * @param string $dbUser Database username.
     * @param string $dbPassword Database password.
     * @param string $dbName Database name.
     */
    protected function connect($dbHost, $dbUser, $dbPassword, $dbName)
    {
        $this->connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        // Check for connection errors
        if ($this->connection->connect_error) {
            $this->handleError(004);
        }
    }

    /**
     * Run a SQL query.
     * @param string $sql_statement SQL query statement.
     * @return mixed Query result.
     */
    public function runQuery($sql_statement)
    {
        $this->queryData = $this->connection->query($sql_statement);

        // Check for query execution errors
        if (!$this->queryData) {
            $this->handleError(003);
        }

        return $this->queryData;
    }

    /**
     * Fetch data from the query result.
     * @return array Fetched rows.
     */
    public function fetchData()
    {
        $rows = array();

        // Fetch data and store in an array
        while ($row = $this->queryData->fetch_assoc()) {
            $rows[] = $row;
        }

        // Check if data is empty
        if (empty($rows)) {
            $this->handleError(002);
        }

        return $rows;
    }

    /**
     * Close the database connection.
     * @return bool True if successful, false otherwise.
     */
    public function close()
    {
        return $this->connection->close();
    }

    /**
     * Perform input validation.
     * @param int $input_type Input type (e.g., INPUT_GET).
     * @param string $var_name Variable name.
     * @param int|null $filter Filter type (e.g., FILTER_SANITIZE_STRING).
     * @return mixed Validated input.
     */
    public function getValidation($input_type, $var_name, $filter = null)
    {
        // Check if the variable exists
        if (!filter_has_var($input_type, $var_name)) {
            $this->handleError(001);
        }

        switch ($filter) {
            case null:
                $output = filter_input($input_type, $var_name);
                break;
            case FILTER_SANITIZE_STRING:
            case FILTER_SANITIZE_NUMBER_INT:
                $output = filter_input($input_type, $var_name, $filter);
                break;
            default:
                $this->handleError(005);
        }

        return $output;
    }

    /**
     * Handle errors and terminate the script.
     * @param int $code Error code.
     */
    protected function handleError($code)
    {
        switch ($code) {
            case 001:
                $error = "Validation Failed: Invalid Method or Name";
                break;
            case 002:
                $error = "Fetch Data Failed: Game not found";
                break;
            case 003:
                $error = "Run Query Failed: " . $this->connection->error;
                break;
            case 004:
                $error = "Connection to Database Failed: " . $this->connection->connect_error;
                break;
            case 005:
                $error = "Validation Failed: Filter is of an invalid type";
                break;
            default:
                $error = "Site Terminated: Unknown Error";
        }

        // Close the connection and exit with an error message
        $this->connection->close();
        exit($error);
    }

    /**
     * Search for games based on a search term.
     * @param string $searchTerm Search term.
     * @return array Search results.
     */
    public function searchGames($searchTerm)
    {
        // SQL statement
        $sql = "SELECT id, title, genre, esrb, price FROM $this->tableGames WHERE ";

        // Split search terms
        $terms = explode(' ', $searchTerm);

        foreach ($terms as $t) {
            $sql .= "title LIKE '%$t%' AND ";
        }

        $sql = rtrim($sql, 'AND ');

        // Run the query
        $this->runQuery($sql);

        // Handle errors
        if (!$this->queryData) {
            $this->handleError(003);
        }

        // Fetch and return the results
        return $this->fetchData();
    }

}


