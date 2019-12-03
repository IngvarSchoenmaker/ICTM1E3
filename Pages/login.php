<?php
require '../incl/header.php';
?>
<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
    <div class = "inlogscherm" style="display: inline-block">
        <form method="post" action="login.php">
            <fieldset>

    <legend>inloggen:</legend>
                Emailadres:<br><input type="email" name="emailadres"><br>
                wachtwoord:<br><input type="password" name="password"><br><br>
                <button type="submit" name="inloggen"> login</button> <br>
            </fieldset>
            <?php
            if(isset($_POST['inloggen'])) {

                $email = $_POST['emailadres'];
                $password = $_POST['password'];

                if (empty($email) || empty($password)) { // hier wordt gecontroleerd of de input velden zijn ingevuld

                    print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">De verplichte velden zijn niet ingevuld!</p>");
                }
                ?>

                <!--    hier is een verwijzing naar verschillende pagina-->

                <div>
                    <a href="signup.php">Geen account?</a> <br>
                    <a href="wachtwoordvergeten.php">Wachtwoord vergeten?</a>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                <?php

                if (isset($_POST['inloggen'])) {

                    $email = $_POST['emailadres'];
                    $password = $_POST['password'];
                    print($password);
                    if (empty($email) || empty($password)) { // hier wordt gecontroleerd of de input velden zijn ingevuld
                        print("De verplichte velden zijn niet ingevuld!");
                    } else {

                        $stmt = $conn->prepare("SELECT Email, Password FROM customer WHERE Email=?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $row = mysqli_fetch_array();

                        if (!password_verify($password, $row['password'])) {
                            $passwordcheck = FALSE;
                        }
                        var_dump($passwordcheck);
                    }
                    if ($passwordcheck === false) {
                        $stmt->close();
                        print('incorrecte wachtwoord');
                    } else {
                        $stmt->close();
                        session_start();
                        $_SESSION['loginsucessvol'] = true;
                        print("correct wachtwoord!");
                    }
                }
            }
    require '../incl/footer.php';
    ?>