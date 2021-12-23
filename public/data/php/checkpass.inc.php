<?php 

include 'dbh.inc.php';

if(!isset($_SESSION['UID'])){
    header('location: ../../../?error=notpermitted');
}

?>