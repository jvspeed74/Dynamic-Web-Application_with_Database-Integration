<?php
/*
 *
 * */

// Initial Page Requirements
require_once('../database.inc.php');
require_once('../functions.inc.php');

// Check session status
checkSession();

// Set cart as existing array or create an empty one
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// Check query ID, validate, and return to $id
$id = getValidation(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// If ID already exists in cart, increment; else set to 1
$cart[$id] = (array_key_exists($id, $cart)) ? $cart[$id] + 1 : 1;

// Update session variable
$_SESSION['cart'] = $cart;

// Redirect to showcart.php
header('Location: showcart.php');

