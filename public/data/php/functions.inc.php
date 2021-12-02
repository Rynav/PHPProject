<?php


function emptyInputSignup($name, $email, $password, $pwdRepeat){

    $result = false;

    if (empty($name) || empty($email) || empty($password) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($name){
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function PwdMatch($password, $pwdRepeat){
    $result = false;

    if ($password !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function UidExists($conn, $name){    
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../../register/?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../../register/?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password, $namename, $lastname){
    $sql = "INSERT INTO users (username, email, password, name, lastname) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../../register/?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPwd, $namename, $lastname);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../../../register/?error=none");
}


function emptyInputLogin($username, $pwd){
    $result = false;

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = UidExists($conn, $username);

    if ($uidExists === false) {
        header('location: ../../../login?error=wronglogin');
        exit();
    }

    $pwdHashed = $uidExists["password"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header('location: ../../../login?error=wronglogin');
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION['UID'] = $uidExists['ID'];
        $_SESSION['Username'] = $uidExists["username"];

        header('location: ../../../');

        if(!file_exists('../../api/images/' . $_SESSION['UID'] . '.jpg'));{
            downloadPFP($_SESSION['Username'], $_SESSION['UID']);
        }
        exit();
    }
}

function checkBal($conn, $username){

    $uidExists = UidExists($conn, $username);

    if(!$uidExists){
        echo "<p>Some shit went wrong try logging out and back in!</p>";
        exit();
    }

    $bal = $uidExists["balance"];

    return $bal;
}


function modifybal($conn, $username, $value){

    $uidExists = UidExists($conn, $username);

    if($uidExists == false) {
        header('location: ../../../dashboard/?error=stmtfailed');
        exit();
    }

    $bal = $uidExists['balance'];

    $sql = "UPDATE users SET balance = ($bal + $value) WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        header('location: ../../../dashboard');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
      
    mysqli_close($conn);
}

function downloadPFP($username, $uid){
    $ch = curl_init('https://eu.ui-avatars.com/api/?name=' . $username);
    $fp = fopen('../../api/images/' . $uid . '.jpg', 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

function changePass($conn, $username ,$passold, $passnew, $passnewRep){
    $uidExists = UidExists($conn, $username);

    if(empty($passold) || empty($passnew) || empty($passnewRep)){
        header('location: ../../../dashboard/?error=emptyFields&tab=password');
        exit();
    }

    $pwdHashed = $uidExists["password"];

    $checkPwd = password_verify($passold, $pwdHashed);

    if($checkPwd === false){
        header('location: ../../../dashboard/?error=wrongpass&tab=password');
        exit();
    }else if($checkPwd === true){

        $hashedPwd = password_hash($passnew, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = '$hashedPwd' WHERE username = '$username'";

        if (mysqli_query($conn, $sql)) {
            header('location: ../../../dashboard/?error=none&tab=password');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
          
        mysqli_close($conn);

    }
}

function UIDExists1($conn, $uid) {
    $sql = "SELECT * FROM users WHERE ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../../register/?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function getUsername($conn, $uid){
    $sql = "SELECT username FROM users WHERE ID = '$uid'";

    $result = $conn->query($sql);

    while($row = $result->fetch_array()){
        return $row['username'];
    }

}

function checkpass($conn, $uid){
    $sql = "SELECT salt FROM users WHERE ID = '$uid'";

    $result = $conn->query($sql);

        while($row = $result->fetch_array()){
            return $row['salt'];
        }
}
?>