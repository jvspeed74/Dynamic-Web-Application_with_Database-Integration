# Game n' Go, a mock video game website
This Project creates a website with the intention of implementing several backend techniques such as DBMS, SQL, and Application State.

# Advanced Feature #1
Password Hashing
- Only hashed passwords are input into the database
- When a user logs in, the username is queried into the database and the hashed password is retrieved by fetching associate keys.
- The default password and hashed password are checked by the function password_verify.

# Advanced Feature #2
Prevention of Duplicate Emails and Usernames
- Duplicate entries prevented in signup.inc.php.
- Entries are checked by querying the $username and $email in seperate instances. If there are any results (true), attach a session variable that prompts one of the according message to appear:
- "Username already exists. Please choose a different one."
- "Email is already registered with an account."
- The user will be redirected to the signup page with an updated $_SESSION['signup_status'] to try again.
