<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="./public/data/css/index.css">
</head>

<body>

    <div class='box is-centered'>
        <?php
            if (isset($_SESSION["UID"])) {
                include('public/data/php/includes/navbar-loggedin.php');
                if($_SESSION["UID"] == "1"){
                    echo "<a href='/adminpanel'> <button name='admn' class='button is-green' style='margin-right: 10px'>Admin Panel</button> </a>"; 
                }
            } else {
                echo "<a href='/login'> <button name='lgbtn' class='button is-green' style='margin-right: 10px'>Login</button> </a>";
                echo "<a href='/register'> <button name='rgbtn' class='button is-green'>Register</button> </a>";
            }

            
            ?>

    </div>
    <?php
        if(isset($_GET["error"])){
        if($_GET["error"] == "loggedout"){
            echo "<div class='notification is-success' style='max-width: 20vw;min-width:20vw; position: absolute;top: 100%;left: 100%;transform: translate(-100%, -100%);'>
            <button class='delete'></button>
            Logged out successfully!
            </div>";
        }else if($_GET["error"] == "notpermitted"){
            echo "<div class='notification is-danger' style='max-width: 20vw;min-width:20vw; position: absolute;top: 100%;left: 100%;transform: translate(-100%, -100%);'>
            <button class='delete'></button>
            You are not permitted to access that area! Either <a href='login'>log in</a> or <a href='register'>register</a> for free!
            </div>";
        }
    }
    ?>

<script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>

</html>