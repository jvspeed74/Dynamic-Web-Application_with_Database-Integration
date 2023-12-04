<?php
include("header.php");
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
    <h2>Log In</h2>
    <form action="includes/authentication/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username..." required/>
        <input type="password" name="pwd" placeholder="Password..." required/>
        <button type="submit" name="Submit">Login</button>
    </form>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
