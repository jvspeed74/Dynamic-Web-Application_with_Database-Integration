<?php
$pageTitle = "Login";
include("header.php");
checkLogin();
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
    <h2>Login to your account</h2>
    <h3>Please enter your username and password to login.</h3>
    <form action="includes/authentication/login.inc.php" method="post">
        <input type="text" name="username" maxlength="50" placeholder="Username..." required/>
        <input type="password" name="password" maxlength="255" placeholder="Password..." required/>
        <button type="submit" name="Submit">Login</button>
    </form>
        <p><a href="signup.php">Create an account</a>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
