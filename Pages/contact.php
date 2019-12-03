<?php
include '../incl/db.php';
include '../incl/header.php';

?>
<div class="container" style="margin-top:200px; margin-bottom: 100px; text-align: center">
    <div class="row">
        <div class="col-md-6 col-sm-6">
<fieldset>
<legend style="color: #008CBA">Stuur ons een bericht!</legend>
<form method="post" action="contact.php">

Voornaam:<br><input type="text" name="Voornaam"> <br>
Achternaam:<br><input type="text" name="Achternaam"> <br>
Emailadres:<br><input type="text" name="Email"> <br>
Telefoonnummer:<br><input type="text" name="Telefoonnummer"> <br>
Bericht:<br><textarea name="Opmerking"></textarea> <br>



</fieldset>

<?php
            $foutchar = "";
            $foutemail = "";
            $foutnummer = "";


            if(isset($_POST['verzenden'])) { // checkt of er gesubmit is
                $voornaam = $_POST['Voornaam'];
                $achternaam = $_POST['Achternaam'];
                $Email = $_POST['Email'];
                $Telefoonnummer = $_POST['Telefoonnummer'];
                $Opmerking = $_POST['Opmerking'];

                // controleert de voornaam en achternaam
                if (!preg_match("/^[a-zA-Z ]*$/", $voornaam) || !preg_match("/^[a-zA-Z]*$/", $achternaam)) {
                    $foutchar = "De ingvoerde Voornaam of achternaam is ongeldig!";
                    $_GET['Achternaam'] = $achternaam;

                // controleert of de email wel geldig is. Maar ook voor gevaarlijke symbolen
                } elseif (!filter_var(FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9@_.]*$/", $Email) || preg_match("/^[#$=;or]*$/", $Email)){
                    $foutemail = "De ingevoerde Email is ongeldig!";

                // Controleert op telefoonnummer
                } elseif (!preg_match("/^(06)[0-9]*$/", $Telefoonnummer) || (strlen($Telefoonnummer) !== 10)) {

                    $foutnummer = "ingevoerde nummer is ongeldig!";

                // Zodra er alles is gecontroleert en geen errors bevatten dan wordt de data toevoegd in de database
                } else {
                    $stmt = $conn->prepare("INSERT INTO contactform(First_name, Last_Name, Email, Phone, Message) VALUES(?,?,?,?,?)");
                    $stmt->bind_param("sssss", $voornaam, $achternaam, $Email, $Telefoonnummer, $Opmerking);
                    $stmt->execute();
                    $stmt->close();

                   $_GET['Query'] = true;

                }


            }
            ?>
            <div>
                <input  type="submit" value="verzenden" name="verzenden">
            </div>
            <?php echo "<p style='color: red'>".$foutchar; ?>
            <?php echo "<p style='color: red'>".$foutnummer; ?>
            <?php echo "<p style='color: red'>".$foutemail; ?>

            <?php if(isset( $_GET['Query'])){
                if($_GET['Query'] === true) {
                echo "<p style='color:black;font-size: 20px;'>Bedankt voor uw Medewerking!</p>";
                }
            } ?>
            </form>
        </div>
    <div class="col-md-6 col-sm-6">
        <div>
            <img src="../recources/voorbeeld%20fotos/ww1.jpg">
        </div>
        <div>
            <span>
                Hoofdlocatie
            </span>
        </div>
        <div>
            <span>
                Admiraal de ruiterweg 65 <br>
                1078WB Amsterdam
            </span>
        </div>
        <div>
            <span class="txt1 p-b-20">
                Neem contact met ons op
            </span>
        </div>
        <div>
            <span class="txt3">
                Mobiel: 06-5812914012<br>
                Huisnummer: 020-2134123
            </span>
        </div>
        <div>
            <span class="txt1 p-b-20">
                Supportdienst 24/7
			</span>

            <span class="txt3">
			    WWI@Worldwideimporters.com
            </span>

            <div>
                <span>
                    Volg ons op: <a href="https://nl-nl.facebook.com/"><img src="../recources/voorbeeld%20fotos/facebook.jpg" style="width: 3%;"></a> <a href="https://twitter.com/?lang=nl"><img src="../recources/voorbeeld%20fotos/logo.png" style="width: 3%;"></a>
                </span>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
include '../incl/footer.php';
?>
