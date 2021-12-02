<?php
session_start();

if(isset($_POST['submit'])){

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $uid = $_SESSION['UID'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize > 10000){
                unlink('images/' . $uid . '.jpg');
                unlink('images/' . $uid . '.gif');
                if($fileActualExt == 'jpg' || $fileActualExt == 'png' || $fileActualExt == 'jpeg'){
                    $fileNameNew = $_SESSION['UID'].".jpg";
                    $fileDest = "images/". $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("location: ../../dashboard/?error=none&tab=pfp");
                }else{
                    $fileNameNew = $_SESSION['UID'].".gif";
                    $fileDest = "images/". $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("location: ../../dashboard/?error=none&tab=pfp");
                }

                
            }else{
                header('location: ../../dashboard/?error=toobig&tab=pfp');
            }
        }else{
            header('loaction: ../../dashboard/?error=error&tab=pfp');
        }
    }else{
        header('loaction: ../../dashboard/?error=notsupported&tab=pfp');
    }

}else{
    header('loaction: ../../dashboard/');
    exit();
}