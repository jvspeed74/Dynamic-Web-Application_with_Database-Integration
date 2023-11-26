<?php
require('includes/fnc.php');
require('includes/database.php');
include('includes/header.php');

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

    <!-- Display Game Attributes -->
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
<?php } ?>

<?php
$db->close();
include('includes/footer.php');