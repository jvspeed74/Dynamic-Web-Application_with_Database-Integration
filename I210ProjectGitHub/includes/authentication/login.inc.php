<?php
/**
 * @var $tableUsers
 */
# Declare required functions
require_once("../functions.inc.php");
require_once ("../database.inc.php");

# Get db connection
connect();
global $connection;

# Declare session
checkSession();

# declare login status
$_SESSION['login_status'] = 2;

# declare variables for username and password
$username = $password = "";

# retrieve username and password
if (isset($_POST['username'])) {
    $username = $connection->real_escape_string(trim($_POST['username']));
}
if (isset($_POST['password'])) {
    $password = $connection->real_escape_string(trim($_POST['password']));
}

$query = runQuery
("SELECT * 
              FROM $tableUsers
              WHERE username='$username'
              AND password='$password'
              ");

//A valid user. Need to store the user in session variables.
if ($query->num_rows) {
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['login_status'] = 1;
}

# disconnect from db
disconnect();

# Redirect back to login page
header("Location: ../../login.php");