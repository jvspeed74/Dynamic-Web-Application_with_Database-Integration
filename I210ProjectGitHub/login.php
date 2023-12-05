<?php
$pageTitle = "Login";
include("header.php");
$message = "Please enter your username and password to login.";
checkLogin();
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
    <h2>Login to your account</h2>
    <h3><?php echo $message ?></h3>
    <form action="includes/authentication/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username..." required/>
        <input type="password" name="password" placeholder="Password..." required/>
        <button type="submit" name="Submit">Login</button>
    </form>
        <p><a href="signup.php">Create an account</a>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
