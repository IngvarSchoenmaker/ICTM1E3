<?php
ob_start();
require '../incl/header.php';
?>
    <div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
        <div class="row">
            <div class="col-lg-12">
                <div class="inlogscherm" style="display: inline-block">
                    <form method="post" action="login.php">
                        <legend>Inloggen:</legend>
                        <div class="form-group">
                            <label for="emailadres">Emailadres:</label>
                            <input type="email" class="form-control" name="emailadres">
                        </div>
                        <div class="form-group">
                            <label for="wachtwoord">wachtwoord:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="inloggen">login</button>
                        </div>
                        <?php
                        if (isset($_POST['inloggen'])) {
                            $email = $_POST['emailadres'];
                            $password = $_POST['password'];

                            if (isset($_POST['inloggen'])) {
                                if (empty($email) || empty($password)) { // hier wordt gecontroleerd of de input velden zijn ingevuld
                                    print("<div class=\"alert alert-danger\" role=\"alert\">Alle velden zijn verplicht!</div>");
                                } else {

                                    $stmt = $conn->prepare("SELECT Password FROM customer WHERE Email=?");
                                    $stmt->bind_param("s", $email);
                                    $stmt->execute();
                                    $result = mysqli_stmt_get_result($stmt);
                                    $row = mysqli_fetch_array($result);

                                    //kijkt of wachtwoord goed is
                                    if (!password_verify($password, $row['Password'])) {
                                        $passwordcheck = FALSE;
                                    } else {
                                        $passwordcheck = TRUE;
                                    }
                                    if ($passwordcheck === false) {
                                        print('Incorrecte combinatie');
                                    } else {
                                        //geeft alle sessie gegevens door en word terug gestuurt
                                        $_SESSION['loginsucesesvol'] = $email;
                                        $_SESSION['check'] = "true";
                                        $stmt = $conn->prepare("SELECT Customer_ID FROM Customer WHERE Email = ?");
                                        $stmt->bind_param("s", $email);
                                        $stmt->execute();
                                        $result = mysqli_stmt_get_result($stmt);
                                        $row = mysqli_fetch_array($result);
                                        if (!empty($result)) {
                                            $_SESSION['ID'] = $row['Customer_ID'];
                                        } else {
                                            echo "error!";
                                        }
                                        $stmt->close();
                                        header('Location: ../Pages/index.php');
                                    }
                                }
                            }
                        }
                        ?>
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
require '../incl/footer.php';
ob_end_flush();
?>