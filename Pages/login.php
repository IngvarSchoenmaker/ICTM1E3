<?php
require '../incl/header.php';
?>
<div class="container" style="margin-top:150px">
    <div class = "inlogscherm ">
        <form method="post" action="login.php">
            <fieldset>
                <legend>inloggen:</legend>
                Emailadres:<br><input type="email" name="emailadres"><br>
                wachtwoord:<br><input type="password" name="password">
                <button type="submit" name="registeren"> login</button> <br>
            </fieldset>
            <!--    hier is een verwijzing naar verschillende pagina-->

            <div>
                <a href="signup.php">Geen account?</a> <br>
                <a href="wachtwoordvergeten.php">Wachtwoord vergeten?</a>
            </div>
        </form>
    </div>
</div>


<?php
if(isset($_POST['registeren'])) {

    $email = $_POST['emailadres'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) { // hier wordt gecontroleerd of de input velden zijn ingevuld

        print("De verplichte velden zijn niet ingevuld!");

    } else {
        header("location: index.php?login=success");
    }
}
require '../incl/footer.php';
?>