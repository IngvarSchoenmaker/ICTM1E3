<?php
include '../incl/header.php';
?>

<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (isset($_POST['send'])) {
                $code = $_POST['code'];
                $ww = $_POST['wachtwoord'];
                echo $ww . "<br>" . $code . "<br>";
            }
            ?>
            <form method="post" action="veranderwachtwoord.php">
                nieuw wachtwoord: <input name="wachtwoord"><br>
                uw code: <input name="code" placeholder="<?php echo $_GET['code']; ?>" value="<?php echo $_GET['code']; ?>"><br>
                <button type="Submit" name="send">Verander wachtwoord</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../incl/footer.php';
?>