<?php
/**
 * Checks session status and initiates a session if there is not one already active.
 * @return void
 */
function sessionStatus()
{
    if (session_status() == PHP_SESSION_NONE)
        session_start();
}

/**
 * Perform input validation.
 * @param int $input_type Input type (e.g., INPUT_GET).
 * @param string $var_name Variable name.
 * @param int|null $filter Filter type (e.g., FILTER_SANITIZE_STRING).
 * @return mixed Validated input.
 */
function getValidation($input_type, $var_name, $filter = null)
{
    // Check if the variable exists
    if (!filter_has_var($input_type, $var_name)) {
        raiseError("There was an error retrieving ID");

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
            raiseError("An invalid filter was used when getting validation");
    }

    return $output;
}

/**
 * Raises errors and terminates the script.
 * @param string $error_string Error message that gets displayed
 * @return void
 */
function raiseError($error_string)
{
    header("Location: error.php?m$error_string");
    die();
}