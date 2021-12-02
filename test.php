<div id='curpfp'>
    <p>Current profile picture:</p>
    <?php $uid = $_SESSION['UID'];
    echo "<img src='../public/api/images/" . $uid . ".jpg' height='64' width='64' class='rounded-full' style='margin-left: 2.5vw; margin-top: 10px'/>";
    ?>
</div><br />
<div id='newpfp'>
    <p>New profile picture:</p>
    <form action='../public/api/upload.php' method='post' enctype='multipart/form-data'>
        <div class='file is-info' style='margin-bottom: 1vh; margin-top:1vh'>
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