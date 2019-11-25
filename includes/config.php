<?php
// Turns on output buffering
ob_start();
session_start();

date_default_timezone_set("Australia/Brisbane");

try {
    $con = new PDO("mysql:dbname=netflixclone;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>