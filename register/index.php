<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel='stylesheet' href="../public/data/css/index.css">
    <script src="https://kit.fontawesome.com/5396872a4d.js" crossorigin="anonymous"></script>

    
</head>

<body >

<div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <form class="box" style="min-width: 42.4vw;" method="post" action="../public/data/php/register.inc.php" >
        <div>
            <p>Username</p>
            <input id="username" name="Username" placeholder="Username" class='input is-dark' style="max-width: 42vw;"></input>
        </div>
        <div style="white-space: nowrap">
            <p>Name and Second name</p>
            <input name="Name" id="name" placeholder="Name" class='input is-dark' style="display: inline-block; max-width: 20vw;"></input>
            <input name="Lastname" id="surname" placeholder="Second name" class='input is-dark' style="display: inline-block; max-width: 20vw;"></input>
        </div>
        <div>
            <p>Password</p>
            <div class="field has-addons">
                <div class='control'>
                    <input id="password" type="password" name="Pwd" placeholder="Password" class='input is-dark' style="display: inline-block; min-width: 37.3vw">
                </div>
                <div class="control">
                    <button id="showpassbutton" type="button" class="button button1" style="min-width: 3vw; background-color: rgb(24,24,24); border: 1px solid rgb(54,54,54);" onclick="togglepasswordvisibility()"> <span class="icon"><i class="fas fa-eye"></i></span></button> 
                </div>
            </div>
        </div>
        <div>
            <p>Repeat password</p>
                <div class='control'>
                    <input id="password" type="password" name="PwdRepeat" placeholder="Repeat password" class='input is-dark' style="display: inline-block; min-width: 37.3vw">
                </div>
        </div>
        <div>
            <p>Email</p>
            <input id="email" name="Email" placeholder="Email. i.e name@example.com" class='input is-dark' style="max-width: 42vw;"></input>
        </div>
        <button name="submit" class="button is-green" style="margin-top: 5px;">Register</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput"){
            echo "<div class='notification'>
            <button class='delete'></button>
            Please fill all the fields!
          </div>";
        } else if($_GET["error"] == "invalidUid"){
            echo "<div class='notification'>
            <button class='delete'></button>
            This is not a valid username! Please only use these characters: a-z A-Z 0-9!
          </div>";
        } else if($_GET["error"] == "invalidEmail"){
            echo "<div class='notification'>
            <button class='delete'></button>
            Please input a valid email adress!
          </div>";
        } else if($_GET["error"] == "invalidPasswords"){
            echo "<div class='notification'>
            <button class='delete'></button>
            Passwords aren't the same! Please check them for any mistakes.
          </div>";
        } else if($_GET["error"] == "usernameTaken"){
            echo "<div class='notification'>
            <button class='delete'></button>
            This username is already taken. Please use a different one!
          </div>";
        } else if($_GET["error"] == "emailExists"){
            echo "<div class='notification'>
            <button class='delete'></button>
            This email is already in use. Please use a different one!
          </div>";
        } else if($_GET["error"] == 'stmtfailed'){
            echo "<div class='notification'>
            <button class='delete'></button>
            Some server shit failed try again in like 3,2 bilion years
          </div>";
        } else if($_GET["error"] == "none"){
            echo "<div class='notification is-success'>
            <button class='delete'></button>
            Account has been created! Go to Rynav.cf/login to login!
          </div>";
        } 
    }
    ?>

</div>
<script src="../public/data/js/cleave.min.js"></script>
<script type="text/javascript" src="../public/data/js/functions.js"></script>
</body>

</html>

