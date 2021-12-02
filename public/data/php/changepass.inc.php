<?php
//?error=emptyinput
if (isset($_POST["submit"])) {
    session_start();

    $username = $_SESSION['Username'];
    $passwordOld = $_POST["passold"];
    $password = $_POST["passnew"];
    $pwdRepeat = $_POST["passnewRep"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(PwdMatch($password, $pwdRepeat) !== false){
        header("location: ../../../dashboard/?error=invalidPasswords&tab=password");
        exit();
    }
    changePass($conn, $username, $passwordOld, $password, $pwdRepeat);
} else {

}
