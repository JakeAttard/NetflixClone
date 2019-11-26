<?php
if(isset($_POST["submitButton"])) {
    echo "Form was submitted";
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
            <h1>Sign In</h1>
            <h2>Sign in to start watching shows and movies<br> or restart your membership.</h2>
        </div>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="loginButton" value="SIGN IN">
        </form>

        <hr>
        <span class="loginNewSpan">
            <b>New to NetflixClone?</b>
        </span>
        <a href="register.php" class="button">Try 30 days free</a>
    </div>
</div>
</body>
</html>