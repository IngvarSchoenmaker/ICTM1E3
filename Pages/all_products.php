<?php
include '../incl/header.php';
$server = "localhost";
$username = "root";
$password = "";
$dbname = "wideworldimporters";
$conn1 = mysqli_connect($server, $username, $password, $dbname);
$sql = "SELECT * FROM stockitems ";
$result = mysqli_query($conn1, $sql);
$queryResult = mysqli_num_rows($result);
if($queryResult > 0){
    ?>
<div class="container" style="margin-top:150px; margin-bottom: 50px; text-align: left">
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        echo "<p>Item: ". $row['StockItemName'] ."<br> Size: " . $row['Size']. "<br> prijs: " . $row['RecommendedRetailPrice'] . "</p>";
    }
}
?>
</div>
<?php
include '../incl/footer.php';
?>