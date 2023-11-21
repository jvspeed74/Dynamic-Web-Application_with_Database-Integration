<!--/**-->
<!-- * Author: Ayah Hineiti-->
<!-- *  Date: 11/13/23-->
<!-- * Description: Header-->
<!-- */-->

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/banner.css"/>
    <link type="text/css" rel="stylesheet" href="css/global.css"/>
    <link type="text/css" rel="stylesheet" href="css/header.css"/>
    <link type="text/css" rel="stylesheet" href="css/media.css"/>
    <link type="text/css" rel="stylesheet" href="css/navitemsandsearch.css"/>
    <link type="text/css" rel="stylesheet" href="css/product.css"/>
    <title><?php echo $pageTitle; ?></title>

    <?php
    date_default_timezone_set('America/New_York');
    echo date("l, F d, Y", time());
    ?>
    <!-- Nav Bar -->
<body>
<nav>
    <nav class="links" style="--items: 5;">
        <div class="logo"></div>
        <div class="navbar">
            <ul class="navitems">
                <li><a href="index.php">Home</a></li>
                <li><a href="listgames.php">Games</a></li>
                <li><a href="about.php">About</a></li>
            </ul>

        </div>
        <div class="box">
            <form action="searchresults.php" method="get">
                <input type="text" name="q" placeholder="type..." size="40" required/>
                <input type="submit" name="Submit" id="Submit" value="Search Game"/>
            </form>
    </nav>