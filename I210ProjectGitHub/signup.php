<?php
$pageTitle = "Signup";
include("header.php");
$message = "Please enter your credentials to sign up.";
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
        <h2>Create an account</h2>
        <h3><?php echo $message ?></h3>
        <form action="includes/authentication/signup.inc.php" method="post">
            <input type="text" name="firstname" placeholder="Firstname..." required/>
            <input type="text" name="lastname" placeholder="Lastname..." required/>
            <input type="text" name="email" placeholder="Email..." required/>
            <input type="text" name="username" placeholder="Username..." required/>
            <input type="password" name="password" placeholder="Password..." required/>
            <button type="submit" name="Submit">Sign Up</button>
        </form>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
