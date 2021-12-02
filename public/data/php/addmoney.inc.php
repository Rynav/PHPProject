<?php
if (isset($_POST["submit"])) {

    session_start();

    $uid = $_SESSION["Username"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    modifybal($conn, $uid);
} else {
    header("location: ../../../register/");
    exit();
}
