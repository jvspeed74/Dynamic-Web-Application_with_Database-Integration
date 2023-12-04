<?php
include("header.php");
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
    <h2>Sign Up</h2>
    <form action="includes/authentication/signup.inc.php" method="post">
        <input type="text" name="username" placeholder="Username..." required/>
        <input type="password" name="pwd" placeholder="Password..." required/>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password..." required/>
        <button type="submit" name="Submit">Sign Up</button>
    </form>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
