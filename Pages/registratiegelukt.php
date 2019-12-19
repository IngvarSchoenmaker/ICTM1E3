<?php

require '../incl/header.php';
?>
<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <div class="inlogscherm" style="display: inline-block">

                <!--        Zodra de registratie gelukt is zonder errors dan wordt je door verwezen naar de loginscherm-->
                <?php

                if (isset($_GET['registratie'])) {
                    if ($_GET['registratie'] === "succes") {

                        print("<p style=''>Account is aangemaakt!</p><br>
               <img src='../recources/voorbeeld%20fotos/check.png' width='150px'; <br>");
                    }
                }
                ?> <br><br><br>
                <a href="login.php"><button class="btn btn-primary">Login</button></a>



                </form>
            </div>
        </div>
    </div>
</div>



