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
            <img src="assets/images/netflixlogo.jpg" title="Netflix Logo" alt="Netflix Logo"/>
            <h3>Sign In</h3>
            <span>to continue to NetflixClone</span>
        </div>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="loginButton" value="LOGIN">
        </form>

        <a href="register.php" class="signUpMessage">Dont have an account? Sign up here!</a>
    </div>
</div>
</body>
</html>