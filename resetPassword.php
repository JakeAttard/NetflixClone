<?php
    include("config.php");

    if(!isset($_GET["code"])) {
        exit("Sorry this link is broken.");
    }

    $code = $_GET["code"];

    $getEmailQuery = mysqli_query($con, "SELECT email FROM resetPasswords WHERE code='$code'");

    if(mysqli_num_rows($getEmailQuery) == 0) {
        exit("Sorry this link is broken.");
    }

    if(isset($_POST["password"])) {
        $pw = $_POST["password"];
        $pw = hash("sha512", $pw);

        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];

        $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='email'");

        if($query) {
            $query = mysqli_query($con, "DELETE FROM resetPasswords WHERE code='$code'");
            exit("Your password has been updated!");
        } else {
            exit("Sorry, something went wrong.");
        }
    }
?>

<form method="POST">
    <input type="password" name="password" placeholder="Enter your new password">
    <br>
    <input type="submit" name="submit" value="Update Password">
</form>
