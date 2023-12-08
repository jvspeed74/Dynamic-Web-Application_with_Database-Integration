<?php
/**
 * index.php: homepage
 */
$pageTitle = "Home";
include("header.php");
?>
    <!-- Page Specific Content Starts -->
    <section class="welcome-section">
        <div class="container">
            <h2 class="welcome-text">Welcome to Game 'n Go!</h2>

            <div class="feature-list">
                <p>New Features in This Version:</p>
                <ul>
                    <li>User Authentication & Authorization</li>
                    <li>Advanced Features:</li>
                    <li>Password Hashing</li>
                    <li>Prevention of Duplicate Accounts (username/email)</li>
                </ul>
            </div>

            <div class="contributors-list">
                <p>Contributors and their roles:</p>
                <ul>
                    <li>Jalen Vaughn: Project Manager; Back-end Developer; Database Handler</li>
                    <li>Ayah Hineiti: Post Draft-2 Website Designer; Front-end Developer</li>

                </ul>
            </div>

            <div class="tasks-list">
                <p>Check-out the Project GitHub!</p>
                <ul>
                    <li><a href="https://github.com/jvspeed74/I210SharedProject">https://github.com/jvspeed74/I210SharedProject</a></li>
                </ul>
            </div>
        </div>
    </section>


    <!-- Page Specific Content Ends -->
<?php
include("footer.php");
?>