<?php
    require_once("includes/config.php");
    require_once("includes/classes/PreviewProvider.php");
    require_once("includes/classes/Entity.php");

    if(!isset($_SESSION["userLoggedIn"])) {
        header("Location: register.php");
    }

    $userLoggedIn = $_SESSION["userLoggedIn"];

    $preview = new PreviewProvider($con, $userLoggedIn);
    echo $preview->createPreviewVideo(null);
?>