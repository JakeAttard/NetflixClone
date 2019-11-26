<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])) {
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $confirmEmail = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $confirmPassword = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Welcome to NetflixClone</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    </head>

    <body>
        <div class="signInContainer">
            <div class="column">
                <div class="header">
                    <h1>Sign Up</h1>
                    <h2>to continue to NetflixClone</h2>
                </div>

                <form method="POST">
                    <input type="text" name="firstName" placeholder="First name" required>
                    <input type="text" name="lastName" placeholder="Last name" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="email" name="email2" placeholder="Confirm Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password2" placeholder="Confirm Password" required>
                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>

                <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
            </div>
        </div>
    </body>
</html>