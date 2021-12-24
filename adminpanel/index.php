<?php
    session_start();
    if($_SESSION['UID'] != '1'){
        header('location: ../?error=notpermitted');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../public/data/css/index.css">
</head>

<body>
<div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -40%);">
    <div class="field has-addons">
        <div class='control' style='display: block;'> 
            <?php 
                
                include '../public/data/php/dbh.inc.php';
                include '../public/data/php/functions.inc.php';

                if (!$r = $conn->query("SELECT ID FROM users")) {
                    // handle error
                }
                
                while ($row = $r->fetch_assoc()) {
                    foreach($row as $user) {
                        echo "<div id='buttons' class='control' style='display: block;'>
                        <div class='control'>
                                <button class='button prfbtn' id='info' style='width: 100%; border-radius: 6px 0px 0px 0px; border: none;'>" . getUsername($conn, $user) . "</button>
                        </div>";
                    }
                }
            
                $r->free();
            ?>
        </div>
        <div class="control" id="mainwindow" style="border-radius: 0px 6px 6px 6px; box-shadow: none;">
            <div class="box">
                <div id='curpfp' style='display: inline-block;'>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>
</html>