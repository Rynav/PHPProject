<?php 

include 'dbh.inc.php';

if(!isset($_SESSION['UID'])){
    header('location: ../../../?error=notpermitted');
}


function checkpass($conn){
    $uid = $_SESSION['UID'];
    $sql = "SELECT salt FROM users WHERE uid = $uid";

    $result = $conn->query($sql);

        while($row = $result->fetch_array()){
            return $row['salt'];
        }
}
?>