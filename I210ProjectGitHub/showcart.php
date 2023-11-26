<?php
require ('includes/header.php');

// If cart is empty in any session then run code
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include('includes/footer.php');
    exit();
}

// Update cart array
$cart = $_SESSION['cart'];

// Connect to Database
connect();

// Query items that are in found inside the cart
findItems("SELECT id, title, price FROM $tableGames WHERE 0");

// Place query into an array
$rows = fetchData();

// Loop to display each item found in the cart
foreach ($rows as $row) {
    $id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $qty = $cart[$id];
    $subtotal = $qty * $price;

    ?>

    <!-- Display Shopping Cart Items -->
    <tr>
        <td>Title:</td>
        <td><?= $title ?></td>
    </tr>
    <tr>
        <td>Price:</td>
        <td><?= $price ?></td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td><?= $qty ?></td>
    </tr>
    <tr>
        <td>Subtotal:</td>
        <td><?php printf("%.2f", $subtotal); ?></td>
    </tr>
    <div>
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    </div>
<?php } ?>

<?php
disconnect();
include('includes/footer.php');