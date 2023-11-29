<?php
require ("../includes/database.php");

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
        <div><a href="design.php"><img src="../www/img/logo.png" alt=""/></a></div>


        <div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="listgames.php">Games</a></li>
                <li><a href="showcart.php">Cart: <?= $count ?> item(s)</a></li>
                <li><a href="addgame.php">Add Games</a></li>
            </ul>
        </div>

        <!-- Search bar -->
        <div>
            <form action="searchresults.php" method="get">
                <input type="text" name="q" placeholder="type..." size="40" required/>
                <input type="submit" name="Submit" id="Submit" value="Search Game"/>
            </form>
        </div>

    </nav>
    <!-- Nav Bar Ends -->

    <!-- Page Specific Content Starts -->
    <section>

        <h2>Welcome to Game 'n Go!</h2>
        <p>This web site is a quick demo of minimum project requirements. The CSS document was omitted from this build due
            to clarity issues. It is expected to be available
            in time for Phase 3 of the project on 11/21/23
        </p>

        <p>This build includes these features:</p>
        <ul>
            <li>A homepage</li>
            <li>A product page (dynamic) capable of displaying video games</li>
            <li>A detail page for each individual video game entry</li>
            <li>A basic search feature complementing a MySQL database</li>
        </ul>

        <p>Contributors and their roles:</p>
        <ul>
            <li>Phillip Eilers: Initial Website Design; Database Ideation</li>
            <li>Ayah Hineiti: Front-end Developer (HTML/CSS)</li>
            <li>Jalen Vaughn: Back-end Developer (PHP/phpmyadmin)</li>
        </ul>

        <p>Priority Tasks:</p>
        <ul>
            <li>Debug HTML/CSS Code</li>
            <li>Convert HTML to PHP Web Page with modular design in mind.</li>
            <li>Re-evaluate "handleError" function in "Class: Database" implementing standard exceptions that mysqli
                hosts.
            </li>

    </section>
    <!--Page Specific Content Ends-->

</body>
<!--Body Tag ends-->

<!-- Footer Tag Starts -->
<footer>
    <hr/>
    &copy <?php echo date("Y") ?> Game n' Go. All Rights Reserved.
</footer>

</html>