<?php
/**
 * Author: Ayah Hineiti
 *  Date: 11/13/23
 * Description: Homepage
 */

// Initial Page Requirements
$pageTitle = "Game 'n Go";
require('header.php');
?>

<section>
        <h2>Welcome to Game 'n Go: Draft 2 Edition</h2>
        <p>This web site is a quick demo of project progress. Many elements are a work in progress with CSS design being
            our group's main focus currently. We've actually branched off this build on 11/27/23 and started working
            exclusively on the Final Draft.
        </p>

        <div>
            <p>New Features in This Build:</p>
            <ul>
                <li>Add New Games to the Database</li>
                <li>Update Existing Game Details</li>
                <li>Delete Games from the Database</li>
                <li>Shopping Cart Functionality</li>
            </ul>
        </div>

        <div>
            <p>Contributors and their roles:</p>
            <ul>
                <li>Jalen Vaughn: Project Manager; Back-end Developer; Software Architect</li>
                <li>Ayah Hineiti: Front-end Developer; Mid-Project Website Designer</li>
                <li>Phillip Eilers: Initial Website Design; Database Ideation; Data Specialist</li>
            </ul>
        </div>

        <div>
            <p>Stay Updated with our GitHub!</p>
            <ul>
                <li>You'll be able to view tasks, issues, and milestones</li>
                <li><a href="https://github.com/jvspeed74/I210SharedProject/issues">GitHub Link</a></li>
            </ul>
        </div>
    </section>

<?php
include('footer.php');