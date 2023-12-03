<?php
require("../includes/database.php");

checkSession();

$count = 0;

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}


?>
<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="test.css"/>
    <title>Game 'n Go</title>

</head>
<!-- Body Tag Starts -->
<body>

    <!-- Nav Bar Starts -->
    <nav>

        <!-- Logo -->

        <div class="header">
            <div class="logo">
                <a href="../index.design.php"><img src="logo.png" alt="Logo"></a>
            </div>

            <div class="nav">
                <ul>
                    <li><a href="index.design.php">Home</a></li>
                    <li><a href="listgames.design.php">Games</a></li>
                    <li><a href="showcart.design.php">Cart: <?= $count ?> item(s)</a></li>
                    <li><a href="addgame.design.php">Add Games</a></li>
                </ul>
            </div>

            <!-- Search bar -->
            <div class="search">
                <form action="searchresults.design.php" method="get">
                    <input type="text" name="q" placeholder="Search..." required>
                    <input type="submit" name="Submit" id="Submit" value="Search Game">
                </form>
            </div>
        </div>

    </nav>
    <!-- Nav Bar Ends -->