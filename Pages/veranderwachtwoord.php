<?php
include '../incl/header.php';
?>

<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="veranderwachtwoord.php">
                nieuw wachtwoord: <input name="wachtwoord"><br>
                uw code: <input name="code" placeholder="<?php echo $_GET['code']; ?>" value="<?php echo $_GET['code']; ?>"><br>
                <button type="Submit" name="send">Verander wachtwoord</button>
                <?php
                if (isset($_POST['send'])) {
                    $code = $_POST['code'];
                    $ww = $_POST['wachtwoord'];
                    $wachtwoord = password_hash($ww, PASSWORD_DEFAULT);

                    $sql = $conn->prepare("SELECT * FROM customer WHERE Generated_Key = ?");
                    $sql->bind_param('s', $code);
                    $sql->execute();
                    $result = mysqli_stmt_get_result($sql);
                    $row = mysqli_fetch_array($result);
                    if (!empty($row)) {
                        $sql2 = $conn->prepare("UPDATE customer SET Password = ? WHERE Generated_Key = ?");
                        $sql2->bind_param("ss", $wachtwoord, $code);
                        $sql2->execute();
                        header("Location: registratiegelukt.php?wachtwoord=succes");
                    }
                    else {
                        echo "Uw heeft geen nieuw wachtwoord";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include '../incl/footer.php';
?>