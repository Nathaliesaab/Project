<?php
$DBhost = "localhost";
$DBuser = "root";
$DBPass = "";
$DBName = "OnlinePharmacy-NathalieSaab";
$con = mysqli_connect($DBhost, $DBuser, $DBPass, $DBName);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
