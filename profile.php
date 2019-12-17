<?php
    require_once("includes/header.php");
    require_once("includes/classes/Account.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");

    $detailsMessage = "";

    if(isset($_POST["saveDetailsButton"])) {
        $account = new Account($con);

        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

        if($account->updateDetails($firstName, $lastName, $email, $userLoggedIn)) {
            $detailsMessage = "<div class='alertSuccess'>
                                    Details Updated Successfully!
                               </div>";
            echo "success";
        } else {
            $errorMessage = $account->getFirstError();
            $detailsMessage = "<div class='alertFailure'>
                                    $errorMessage
                               </div>";
        }
    }
?>

<div class="settingsContainer column">
    <div class="formSection">
        <form method="POST">
            <h2>User Details</h2>

            <?php
                $user = new User($con, $userLoggedIn);

                $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
                $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
                $email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();
            ?>

            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $firstName; ?>">
            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastName; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

            <div class="message">
                <?php echo $detailsMessage; ?>
            </div>

            <input type="submit" name="saveDetailsButton" value="Save">
        </form>
    </div>

    <div class="formSection">
        <form method="POST">
            <h2>Update Password</h2>
            <input type="password" name="oldPassword" placeholder="Old Password">
            <input type="password" name="newPassword" placeholder="New Password">
            <input type="password" name="newPassword2" placeholder="Confirm New Password">

            <input type="submit" name="savePasswordButton" value="Save">
        </form>
    </div>
</div>
