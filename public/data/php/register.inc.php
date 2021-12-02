<?php
//?error=emptyinput
if (isset($_POST["submit"])) {

    $name = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Pwd"];
    $pwdRepeat = $_POST["PwdRepeat"];
    $namename = $_POST["Name"];
    $lastname = $_POST["Lastname"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $password, $pwdRepeat, $namename, $lastname) !== false){
        header("location: ../../../../register/?error=emptyinput");
        exit();
    }
    if(invalidUid($name) !== false){
        header("location: ../../../../register/?error=invalidUid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../../../register/?error=invalidEmail");
        exit();
    }
    if(PwdMatch($pwdRepeat, $password) !== false){
        header("location: ../../../register/?error=invalidPasswords");
        exit();
    }
    if(UidExists($conn, $name) !== false){
        header("location: ../../../register/?error=usernameTaken");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../../../register/?error=emailExists");
        exit();
    }
    createUser($conn, $name, $email, $password, $namename, $lastname);
} else {
    header("location: ../../../register/");
    exit();
}
