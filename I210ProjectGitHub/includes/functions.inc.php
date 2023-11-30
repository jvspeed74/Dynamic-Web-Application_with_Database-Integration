<?php

/**
 * Error handling sequence that disconnects from the database, redirect user to the error page,
 * and terminates the script
 * @param string $error_string Error message.
 * @return void
 */
function raiseError($error_string)
{
        global $connection;

    // Disconnect from Database
    if ($connection) {
        disconnect();
    }

    // Redirect user to correct page depending on location
    if (file_exists('error.php')) {
        header("Location: error.php?m=$error_string");

    } elseif (file_exists('../../error.php')) {
        header("Location: ../../error.php?m=$error_string");
    }

    // Terminate the script
    die();
}

/**
 * Checks session status and initiates a session if there is not one already active.
 * @return void
 */
function checkSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        if (!session_start()) {
            raiseError("There was an error starting a new session.");
        }
    }
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
    $output = false;
    switch ($filter) {
        case null:
            $output = filter_input($input_type, $var_name);
            break;
        case FILTER_SANITIZE_STRING:
        case FILTER_SANITIZE_NUMBER_INT:
            $output = filter_input($input_type, $var_name, $filter);
            break;
        default:
            raiseError("There was an error specifying a filter type.");
            break;
    }

    // Check if output exists
    if (!$output) {
        raiseError("There was an error during the filtering process.");
    }

    return $output;
}