<div id="buttons" class='control' style='display: block;'>
    <div class='control'>
        <a href="?tab=info">
            <button class='button prfbtn' id="info" style='width: 100%; border-radius: 6px 0px 0px 0px; border: none;'>Info</button>
        </a>
    </div>
    <div class='control'>
        <a href="?tab=pfp">
            <button class='button prfbtn' id="pfp" style='width: 100%; border-radius: 0px 0px 0px 0px; border: none; background-color: rgb(24,24,24)'>Profile picture</button>
        </a>
    </div>
    <div class='control'>
        <a href="?tab=password">
            <button class='button prfbtn' id="pass" style='width: 100%; border-radius: 0px 0px 0px 6px; border: none;'>Password</button>
        </a>
    </div>
</div>
<div class="control" id="mainwindow" style="border-radius: 0px 6px 6px 6px; box-shadow: none;">
    <div class="box">
        <div id='curpfp' style='display: inline-block;'>
            <p>Current profile picture:</p>
            <?php 
            $uid = $_SESSION['UID'];

                if(file_exists('../public/api/images/' . $uid . '.gif')){
                    echo "<img src='../public/api/images/" . $uid . ".gif' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 30%; margin-top: 10px'/>";
                }else if(file_exists('../public/api/images/' . $uid . '.jpg')){
                    echo "<img src='../public/api/images/" . $uid . ".jpg' class='rounded-full' style='object-fit: fill; height: 64px; width: 64px; margin-left: 30%; margin-top: 10px'/>";
                }
            ?>
        </div><br/>
        <div id='newpfp' style='margin-top: 10px'>
            <p>New profile picture:</p>
            <form action='../public/api/upload.php' method='post' enctype='multipart/form-data'>
                <div class='file is-info' style='margin-bottom: 5px; margin-top: 5px'>
                    <label class='file-label'>
                        <input class='file-input' type='file' name='file'>
                        <span class='file-cta'>
                            <span class='file-icon'>
                                <i class='fas fa-upload'></i>
                            </span>
                            <span class='file-label'> Select new one </span>
                        </span>
                    </label>
                </div>
                <button name='submit' class='button is-green' style='border-radius: 4px; min-width: 8.7vw;'>
                    <span class='icon'>
                        <i class='fas fa-check'></i>
                    </span>
                    <span>Confirm</span>
                </button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "notsupported"){
            echo "<div class='notification' style='max-width: 11vw;'>
            <button class='delete'></button>
            You can only use png, jpg, jpeg and gifs!
          </div>";
        } else if($_GET["error"] == "error"){
            echo "<div class='notification' style='max-width: 11vw;'>
            <button class='delete'></button>
            Some error has occured. Please try again!
          </div>";
        } else if($_GET["error"] == 'toobig'){
            echo "<div class='notification' style='max-width: 11vw;'>
            <button class='delete'></button>
            File you tried to upload is too big. Use a file smaller than 10mb.
          </div>";
        } else if($_GET["error"] == "none"){
            echo "<div class='notification is-success' style='max-width: 11vw;'>
            <button class='delete'></button>
            Profile picture successfully changed!
          </div>";
        } 
    }
    ?>
</div>
