<?php


// Initial Page Requirements
$pageTitle = "Checkout";
require('includes/header.php');

$_SESSION['cart'] = array();
?>

<h2>Checkout</h2>
<p>Thank you for shopping with us. Your business is greatly appreciated. You will
    be notified once your items are shipped.
</p>

<?php
include("includes/footer.php");