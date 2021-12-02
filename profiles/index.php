<?php
    session_start();

    if(!isset($_SESSION['UID'])){
        header('location: ../?error=notpermitted');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profiles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="../public/data/css/index.css">
</head>

<body>

<div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"> 
   <?php 
            
            include '../public/data/php/dbh.inc.php';
            include '../public/data/php/functions.inc.php';

            if (!$r = $conn->query("SELECT ID FROM users")) {
                // handle error
            }
            
            while ($row = $r->fetch_assoc()) {
                foreach($row as $user) {
                    include '../public/data/php/includes/miniprofile.php';
                }
            }
        
            $r->free();
        ?>

</div>
<script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>

</html>