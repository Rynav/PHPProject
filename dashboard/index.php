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
            <div id="buttons" class='control' style='display: block;'>
                <div class='control'>
                    <a href="?tab=info">
                        <button class='button prfbtn' id="info" style='width: 100%; border-radius: 6px 0px 0px 0px; border: none;'>Info</button>
                    </a>
                </div>
                <div class='control'>
                    <a href="?tab=pfp">
                        <button class='button prfbtn' id="pfp" style='width: 100%; border-radius: 0px 0px 0px 0px; border: none;'>Profile picture</button>
                    </a>
                </div>
                <div class='control'>
                    <a href="?tab=password">
                        <button class='button prfbtn' id="pass" style='width: 100%; border-radius: 0px 0px 0px 6px; border: none;'>Password</button>
                    </a>
                </div>
            </div>
            <div class="box control" id="mainwindow" style="border-radius: 0px 6px 6px 6px; box-shadow: none;">
                <div class="" id="curpfp"> 
                    <p>Current profile picture:</p>
                    <?php
                        $uid = $_SESSION['UID'];

                        echo "<img src='../public/api/images/" . $uid . ".jpg' height='64' width='64' class='rounded-full' style='margin-left: 2.5vw; margin-top: 10px'/>"
                    ?>
                </div>
                <br/>
                <div class="" id="newpfp"> 
                    <p>New profile picture:</p>
                    <form action="data/api/upload.php" method="post" enctype="multipart/form-data">
                        <div class="file is-info has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Right file…
                                    </span>
                                </span>
                                <span class="file-name">
                                    
                                </span>
                            </label>
                        </div>
                        <button class="button is-green" name="submit" style="border-radius: 4px;">Confirm upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>

</html>