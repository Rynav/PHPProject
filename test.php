<div id="pfp" class="column" style="margin-left: 2vw">
                    <?php

                    $uid = $_SESSION["UID"];

                    echo "<img src='../public/api/images/" . $uid . ".jpg' height='64' width='64' class='rounded-full'/>"

                    ?>
                </div>
                <div id="username" class="column" style="display: inline-block; margin-left: 1vw">
                    <p> Username: </p>
                    <?php
                    if (isset($_SESSION['Username'])) {
                        echo '<p style="color: rgb(150,150,150)">' . $_SESSION['Username'] . '</p>';
                    } else {
                        echo "<p style='color: rgb(150,150,150)'> Unknown (how?) </p>";
                    }
                    ?>
                </div>
                <div id="UID" style="display: inline-block;">
                    <p> UID: </p>
                    <?php
                    if (isset($_SESSION['UID'])) {
                        echo '<p style="color: rgb(150,150,150)">' . $_SESSION['UID'] . '</p>';
                    } else {
                        echo "<p style='color: rgb(150,150,150)'> Unknown (how?) </p>";
                    }

                    ?>
                </div>
                <div id="bal" class="column" style="margin-left:1vw; margin-right: 1vw">
                    <p> Current balance: </p>
                    <?php

                    include_once "../public/data/php/dbh.inc.php";
                    include_once "../public/data/php/functions.inc.php";

                    echo '<p style="color: rgb(150,150,150)"> $' . checkBal($conn, $_SESSION['Username']) . '</p>';

                    ?>
                </div>