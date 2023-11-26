<?php
require('includes/database.php');
include('includes/header.php');

// If cart is empty in any session then run code
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];

$db = new Database();

$db->get_cartContent($cart, "SELECT id, title, price FROM $db->tableGames WHERE 0");

$rows = $db->fetchData();

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
$db->close();
include('includes/footer.php');