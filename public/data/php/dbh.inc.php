<?php

$serverName = "localhost";
$DBUsername = "root";
$DBPassword = "";
$DBName = "logindb";


$conn = mysqli_connect($serverName, $DBUsername, $DBPassword, $DBName);

if(!$conn){
    die('Connection failed: ' . mysqli_connect_error());
}