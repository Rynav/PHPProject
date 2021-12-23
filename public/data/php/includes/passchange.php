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
            <button class='button prfbtn' id="pass" style='width: 100%; border-radius: 0px 0px 0px 6px; border: none; background-color: rgb(24,24,24)'>Password</button>
        </a>
    </div>
</div>

<div id="mainwindow" style="border-radius: 0px 6px 6px 6px; box-shadow: none;">
    <form class="box" action="../public/data/php/changepass.inc.php" method="post">
        <div>
            <p style='margin-bottom: 10px;'>Old password:</p>
            <div class="field has-addons">
                    <div class='control'>
                        <input id="password" type="password" name="passold" placeholder="Password" class='input is-dark' style="display: inline-block; min-width: 20vw;">
                    </div>
                    <div class="control">
                        <button id="showpassbutton" type="button" class="button button1" style="min-width: 3vw; background-color: rgb(24,24,24); border: 1px solid rgb(54,54,54);" onclick="togglepasswordvisibility()"> <span class="icon"><i class="fas fa-eye"></i></span></button> 
                    </div>
                </div>    
        </div>
        <div style='margin-top: 10px;'>
            <p style='margin-bottom: 10px;'>New password:</p>
            <div class="field has-addons">
                    <div class='control'>
                        <input id="password1" type="password" name="passnew" placeholder="Your new passoword" class='input is-dark' style="display: inline-block; min-width: 20vw;">
                    </div>
                    <div class="control">
                        <button id="showpassbutton1" type="button" class="button button1" style="min-width: 3vw; background-color: rgb(24,24,24); border: 1px solid rgb(54,54,54);" onclick="togglepasswordvisibility1()"> <span class="icon"><i class="fas fa-eye"></i></span></button> 
                    </div>
            </div>
            <input type="password" id="password" name="passnewRep" placeholder="Repeat your new password" class='input is-dark' style="max-width: 23vw;"></input>
        </div>
        <button name="submit" class="button is-green" style="margin-top: 10px;">Submit</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyFields"){
            echo "<div class='notification'>
            <button class='delete'></button>
            Please fill all the fields!
          </div>";
        } else if($_GET["error"] == "invalidPasswords"){
            echo "<div class='notification' style='max-width: 25.1vw;'>
            <button class='delete'></button>
            Passwords aren't the same! Please check them for any mistakes.
          </div>";
        } else if($_GET["error"] == 'wrongpass'){
            echo "<div class='notification'>
            <button class='delete'></button>
            Your old password is invalid. Please try again!
          </div>";
        } else if($_GET["error"] == "none"){
            echo "<div class='notification is-success' style='max-width: 25.1vw;'>
            <button class='delete'></button>
            Password successfully changed! Next time login with your new password.
          </div>";
        } 
    }
    ?>


</div>
