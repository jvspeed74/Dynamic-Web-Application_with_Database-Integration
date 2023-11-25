<?php
/*
 *
 * */
require_once("includes/fnc_sessionStatus.php");
require("includes/database.php");

// Check session status
sessionStatus();

// retrieve session var cart and store
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

} else {
    $cart = array();
}

$id = getValidation

