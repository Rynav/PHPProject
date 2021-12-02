
<div id="buttons" class='control' style='display: block;'>
    <div class='control'>
        <a href="?tab=info">
            <button class='button prfbtn' id="info" style='width: 100%; border-radius: 6px 0px 0px 0px; border: none; background-color: rgb(24,24,24)'>Info</button>
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
    <div id="pfp" class="column" style="margin-left: 2vw">
        <?php

        $uid = $_SESSION["UID"];

        if(file_exists('../public/api/images/' . $uid . '.gif')){
            echo "<img src='../public/api/images/" . $uid . ".gif' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 10%; margin-top: 10px'/>";
        }else if(file_exists('../public/api/images/' . $uid . '.jpg')){
            echo "<img src='../public/api/images/" . $uid . ".jpg' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 10%; margin-top: 10px'/>";
        }
        
        ?>
    </div>
    <div id="username" class="column" style="display: inline-block; margin-left: 1vw">
        <p> Username: </p>
        <?php
        if (isset($_SESSION["Username"])) {
            echo "<p style='color: rgb(150,150,150)'>" . $_SESSION["Username"] . "</p>";
        } else {
            echo "<p style='color: rgb(150,150,150)'> Unknown (how?) </p>";
        }
        ?>
    </div>
    <div id="UID" style="display: inline-block;">
        <p> UID: </p>
        <?php
        if (isset($_SESSION["UID"])) {
            echo "<p style='color: rgb(150,150,150)'>" . $_SESSION["UID"] . "</p>";
        } else {
            echo "<p style='color: rgb(150,150,150)''> Unknown (how?) </p>";
        }

        ?>
    </div>
    <div id="bal" class="column" style="margin-left:1vw; margin-right: 1vw">
        <p> Current balance: </p>
        <?php

        include_once "../public/data/php/dbh.inc.php";
        include_once "../public/data/php/functions.inc.php";

        echo "<p style='color: rgb(150,150,150)'> $" . checkBal($conn, $_SESSION["Username"]) . "</p>";

        ?>
    </div>
</div>