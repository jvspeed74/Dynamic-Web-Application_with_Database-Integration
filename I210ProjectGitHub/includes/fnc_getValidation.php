<?php

    public function getValidation($input_type, $var_name, $filter = null)
    {
        // Check if the variable exists
        if (!filter_has_var($input_type, $var_name)) {
            $error = "There was an error retrieving ID";
            header("Location: error.php?m$error");
            die();
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