<?php
    include '../incl/header.php';
?>

<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="wachtwoordvergeten.php">
                Emailadres:<br><input type="email" name="emailadres"><br><br>
                <button type="Submit" name="send">verstuur mail</button>
            </form>
<?php
if (isset($_POST['send'])) {
    $email = $_POST['emailadres'];
    if (empty($email)) { // hier wordt gecontroleerd of de input velden zijn ingevuld
        print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Het verplichte veld is niet ingevuld</p>");
    }
    else {
        $stmt = $conn->prepare("SELECT * FROM customer WHERE Email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
        if ($row > 0){
            $to = $email;
            $subject = "wachtwoord veranderen";
            $txt = "http://localhost/HBO/ICTM1E3/Pages/veranderww <br>
                    ik verstuur een mail uwu";
            $headers = "From: pboertien@outlook.com";

            mail($to,$subject,$txt,$headers);
        }
    }
}
?>
        </div>
    </div>
</div>
<?php
    include '../incl/footer.php';
?>