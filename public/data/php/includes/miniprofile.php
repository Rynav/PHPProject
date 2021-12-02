<div class="box control" id="mainwindow" style="border-radius: 0px 6px 6px 6px; box-shadow: none; display: inline-grid; margin-right: 10px;">
    <div id="pfp" class="column" style="margin-left: 2vw">
        <?php

        if(file_exists('../public/api/images/' . $user . '.gif')){
            echo "<img src='../public/api/images/" . $user . ".gif' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 10%; margin-top: 10px'/>";
        }else if(file_exists('../public/api/images/' . $user . '.jpg')){
            echo "<img src='../public/api/images/" . $user . ".jpg' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 10%; margin-top: 10px'/>";
        }
        
        ?>
    </div>
    <div id="username" class="column" style="display: inline-block; margin-left: 1vw">
        <p> Username: </p>
        <?php

        include_once '../public/data/php/functions.inc.php';
        include_once '../public/data/php/dbh.inc.php';

        $username = getUsername($conn, $user);

            echo "<p style='color: rgb(150,150,150)'>" . $username . "</p>";;

        ?>
    </div>
    <div id="UID" style="display: inline-block; margin-left: 1.5vw;">
        <p> UID: </p>
        <?php
            echo "<p style='color: rgb(150,150,150)'>" . $user . "</p>";

        ?>
    </div>
    <div id="bal" class="column" style="margin-left:1vw; margin-right: 1vw">
        <p> Current balance: </p>
        <?php

        include_once "../public/data/php/dbh.inc.php";
        include_once "../public/data/php/functions.inc.php";


        echo "<p style='color: rgb(150,150,150)'> $" . checkBal($conn, getUsername($conn, $user)) . "</p>";

        ?>
    </div>
</div>