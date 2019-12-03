<?php
require '../incl/header.php';
?>
    <div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
    <div class="col-lg-12">
    <div class="inlogscherm" style="display: inline-block">
    <form method="post" action="login.php">
    <fieldset>

        <legend>inloggen:</legend>
        Emailadres:<br><input type="email" name="emailadres"><br>
        wachtwoord:<br><input type="password" name="password"><br><br>
        <button type="submit" name="inloggen"> login</button>
        <br>
    </fieldset>
<?php
if (isset($_POST['inloggen'])) {

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

    $email = $_POST['emailadres'];
    $password = $_POST['password'];

    if (isset($_POST['inloggen'])) {
        if (empty($email) || empty($password)) { // hier wordt gecontroleerd of de input velden zijn ingevuld
            print("De verplichte velden zijn niet ingevuld!");
        } else {

            $stmt = $conn->prepare("SELECT Password FROM customer WHERE Email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);
            var_dump($row[0]);

            if (!password_verify($password, $row['Password'])) {
                $passwordcheck = FALSE;
            } else {
                $passwordcheck = TRUE;
            }

        }
        if ($passwordcheck === false) {
            $stmt->close();
            print('incorrecte wachtwoord');
        } else {
            $stmt->close();
            session_start();
            $_SESSION['loginsucesesvol'] = true;
            print("correct wachtwoord!");
        }
    }
}
require '../incl/footer.php';
?>