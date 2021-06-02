<link rel="stylesheet" href="style.css">
    <main>
        <div id="wrapper-main">
            <section class="section-default">
                <form class="form-signup" action="includes/signup.inc.php" method="post">
                     <div id="signup">
                        <h1>Signup</h1>
                    </div>
                    <div id="php">
                        <?php    
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<p class="signuperror">Fill in all fields!</p>';
                            }
                            else if ($_GET["error"] == "invaliduidmail") {
                                echo '<p class="signuperror">Invalid username and e-mail!</p>';
                            }
                            else if ($_GET["error"] == "invaliduid") {
                                echo '<p class="signuperror">Invalid username!</p>';
                            }
                            else if ($_GET["error"] == "invalidmail") {
                                echo '<p class="signuperror">Invalid e-mail!</p>';
                            }
                            else if ($_GET["error"] == "passwordcheck") {
                                echo '<p class="signuperror">Your passwords do not match!</p>';
                            }
                            else if ($_GET["error"] == "usertaken") {
                                echo '<p class="signuperror">Username is already taken!</p>';
                            }
                        }
                        else if ($_GET["signup"] == "success") {
                            echo '<p class="signupsuccess"> Signup successful!</p>';
                        }
                        ?>
                    </div>
                    <div id="form">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="text" name="mail" placeholder="E-mail">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                        <br><br>
                        <button type="submit" name="signup-submit">Sign Up</button>
                        <br>
                        <div id="backto-login">
                            <a class="login" href="header.php">Back to Login</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>

<?php
require "footer.php";
?>

