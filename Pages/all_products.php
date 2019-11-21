<?php
include '../incl/header.php';

$sql = "SELECT * FROM stockitems ";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
    ?>
<div class="container" style="margin-top:150px; margin-bottom: 50px; text-align: left">
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        echo "<p>".$row['StockItemName']."</p>";
    }
}
?>
</div>
<?php
include '../incl/footer.php';