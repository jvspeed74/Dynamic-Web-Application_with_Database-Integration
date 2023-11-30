<?php
/*
 * Author: Jalen Vaughn
 * Date: 11/25/23
 * File: error.php
 * Description: This script displays an error message.
 *
 */

// Initial Page Requirements
$pageTitle = "Game 'n Go: Error";
include("header.php");

// Declare default statement if getValidation fails
$error='Default error.';

// Validate string without function (using raiseError allows for infinite loop)
if (filter_has_var(INPUT_GET, "m")) {
	$error = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
}
?>
<h2>Error</h2>

<table style="width: 100%; border: none">
    <tr>
        <td style="text-align: left; vertical-align: top;">
            <h3>Sorry, but an error has occurred.</h3>
            <div style="color: red">
                <?= $error ?>
            </div>
            <br>
        </td>
    </tr>
</table>
<br><br><br><br><br>
<?php
require_once 'footer.php';
