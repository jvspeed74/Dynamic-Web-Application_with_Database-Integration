<?php
require('includes/fnc.php');
include('includes/header.php');

get_sessionStatus();

$_SESSION['cart'] = array();

$page_title = "Checkout";

require_once("includes/header.php");
?>

<h2>Checkout</h2>
<p>Thank you for shopping with us. Your business is greatly appreciated. You will
    be notified once your items are shipped.
</p>

<?php
include ("includes/footer.php");