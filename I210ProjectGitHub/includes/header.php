<!--/**-->
<!-- * Author: Ayah Hineiti-->
<!-- *  Date: 11/13/23-->
<!-- * Description: Header-->
<!-- */-->

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="www/css/banner.css"/>
    <link type="text/css" rel="stylesheet" href="www/css/global.css"/>
    <link type="text/css" rel="stylesheet" href="www/css/header.css"/>
    <link type="text/css" rel="stylesheet" href="www/css/media.css"/>
    <link type="text/css" rel="stylesheet" href="www/css/navitemsandsearch.css"/>
    <link type="text/css" rel="stylesheet" href="www/css/product.css"/>
    <title><?php echo $pageTitle; ?></title>
</head>
<?php
date_default_timezone_set('America/New_York');
echo date("l, F d, Y", time());
?>
<!-- Nav Bar -->
<body>
<nav>
    <div class="logo">Logo</div>
    <div class="navbar">
        <ul class="navitems">
            <li><a href="index.php">Home</a></li>
            <li><a href="listgames.php">Games</a></li>
        </ul>
        <div class="search">
            <form action="searchresults.php" method="get">
                <input type="text" name="q" size="40" required/>
                <input type="submit" name="Submit" id="Submit" value="Search Game"/>
            </form>
        </div>

    </div>
</nav>
