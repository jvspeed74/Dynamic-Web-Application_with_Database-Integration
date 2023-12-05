<?php
$pageTitle = "Signup";
include("header.php");
checkSignup();
?>
<!--Page Specific Content Starts-->
<section>
    <div class="container">
        <h2>Create an account</h2>
        <h3>Please enter your credentials to sign up.</h3>
        <form action="includes/authentication/signup.inc.php" method="post">
            <input type="text" name="firstname" maxlength="50" placeholder="Firstname..." required/>
            <input type="text" name="lastname" maxlength="50" placeholder="Lastname..." required/>
            <input type="email" name="email" maxlength="50" placeholder="Email..." required/>
            <input type="text" name="username" maxlength="50" placeholder="Username..." required/>
            <input type="password" name="password" maxlength="255" placeholder="Password..." required/>
            <button type="submit" name="Submit">Sign Up</button>
        </form>
</section>
<!--Page Specific Content Ends-->
<?php
include("footer.php");
?>
