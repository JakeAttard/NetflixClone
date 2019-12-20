<?php
 $con = mysqli_connect("localhost", "root", "", "netflixclone");

 if(mysqli_connect_errno()) {
     echo "Failed to connect: " .mysqli_connect_errorno();
 }
?>