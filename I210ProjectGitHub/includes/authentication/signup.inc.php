<?php
/**
 * @var $tableUsers
 */
# Declare required functions
require_once ("../functions.inc.php");

// Kill the script if POST data is not detected
if (!$_POST) {
    raiseError("Direct access to this script is not allowed.");
}

# Declare required database and connection
require_once ("../database.inc.php");
connect();
global $connection;

# Set attributes from POST
$firstname = $connection->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $connection->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$email = $connection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
$username = $connection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $connection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

//set user's role
$role = 2;  //regular user

//execute the insert query
$query = runQuery
(
    "INSERT INTO $tableUsers 
                 VALUES 
                 (
                  NULL, 
                  '$firstname',
                  '$lastname',
                  '$email',
                  '$username',
                  '$password',
                  '$role'
                  )"
);

# Disconnect from Database
disconnect();

# Set session
checkSession();

$_SESSION["login"] = $username;
$_SESSION["name"] = "$firstname $lastname";
$_SESSION["role"] = 2;


$_SESSION["login_status"] = 3;

header("Location: ../../login.php");