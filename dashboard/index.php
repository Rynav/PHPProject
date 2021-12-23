<?php
session_start();

if (!isset($_SESSION['UID'])) {
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
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <script src="https://kit.fontawesome.com/5396872a4d.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <div style="position: absolute;top: 50%;left: 49%;transform: translate(-50%, -49%);">
        <div class="field has-addons">
            <?php 
                if(isset($_GET['tab'])){
                    if($_GET['tab'] == 'info'){
                        include '../public/data/php/includes/infopage.php';
                    }else if($_GET['tab'] == 'pfp'){
                        include '../public/data/php/includes/pfpchange.php';
                    }else if($_GET['tab'] == 'password'){
                        include '../public/data/php/includes/passchange.php';
                    }
                }else{
                    include '../public/data/php/includes/infopage.php';
                }

                
            ?>
        </div>
    </div>

    <?php 
        include_once '../public/data/php/dbh.inc.php';
        include_once '../public/data/php/functions.inc.php';
        if($pass == ""){
            echo "<div class='notification is-danger' style='max-width: 20vw;min-width:20vw; position: absolute;top: 100%;left: 100%;transform: translate(-100%, -100%);'>
            <button class='delete'></button>
            Hey! Important update: we have changed our password protection and you need to change it as fast as possible. Do it in the <a href='?tab=password'>Password</a> tab!
            </div>";
        } 
    ?>
    <script> 
        function togglepasswordvisibility1(){
            var passwordfield = document.getElementById('password1')
            var showpassbutton = document.getElementById('showpassbutton1')
            var shownicon = '<span> <i class="fas fa-eye-slash"></i> </span> '
            var hiddenicon = '<span> <i class="fas fa-eye"></i> </span>'


            if(passwordfield.getAttributeNode('type').value == 'password') {
                passwordfield.setAttribute('type', 'text')
                showpassbutton.innerHTML = shownicon
            }
            else {
                passwordfield.setAttribute('type', "password")
                showpassbutton.innerHTML = hiddenicon
            }
        }
    </script>
    
    <script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>

</html>