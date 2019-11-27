<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["loginButton"])) {
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($username, $password);

        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
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
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>
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