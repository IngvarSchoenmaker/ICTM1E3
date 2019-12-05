<?php
    include '../incl/header.php';
?>

<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <form>
                Emailadres:<br><input type="email" name="emailadres"><br><br>
                <button type="submit" name="send">verstuur mail</button>
            </form>
        </div>
    </div>
<?php
if (isset($_POST['send'])) {
    $email = $_POST['emailadres'];
    if (empty($email)) { // hier wordt gecontroleerd of de input velden zijn ingevuld
        print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Het verplichte veld is niet ingevuld</p>");
        echo "ik niet doen XD";
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
            $txt = "http://localhost/HBO/ICTM1E3/Pages/veranderww";
            $headers = "From: pboertien@outllok.com";

            mail($to,$subject,$txt,$headers);
        }
    }
}
?>
</div>
<?php
    include '../incl/footer.php';
?>