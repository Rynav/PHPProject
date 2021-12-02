<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel='stylesheet' href="../public/data/css/index.css">
    <script src="https://kit.fontawesome.com/5396872a4d.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
        <form class="box" method="post" action="../public/data/php/login.inc.php" >
            <div>
                <p>Username</p>
                <input id="username" name="uid" placeholder="Username or Email" class='input is-dark' style="max-width: 30vw;"></input>
            </div>
            <div>
                <p>Password</p>
                <div class="field has-addons">
                    <div class='control'>
                        <input id="password" type="password" name="pwd" placeholder="Password" class='input is-dark' style="display: inline-block; min-width: 27.1vw">
                    </div>
                    <div class="control">
                        <button id="showpassbutton" type="button" class="button button1" style="min-width: 3vw; background-color: rgb(24,24,24); border: 1px solid rgb(54,54,54);" onclick="togglepasswordvisibility()"> <span class="icon"><i class="fas fa-eye"></i></span></button> 
                    </div>
                </div>
            </div>
            <button name="submit" class="button is-green" style="margin-top: 5px;">Login</button>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<div class='notification'>
                <button class='delete'></button>
                Please fill all the fields!
              </div>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<div class='notification'>
                <button class='delete'></button>
                The account you tried to log into doesn't exist!
              </div>";
            }
        }
        ?>
    </div>


<script src="../public/data/js/cleave.min.js"></script>
<script type="text/javascript" src="../public/data/js/functions.js"></script>

</body>

</html>