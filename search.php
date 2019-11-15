<?php
require_once "db.php";
?>
<h1>Search page</h1>
<div class="article-container">
    <?php
    if(isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM stockitems WHERE SearchDetails LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "There are ".$queryResult." results!";
        if($queryResult > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<a href='articel.php?id=".$row['StockItemID']."'> <div>
                <h3>".$row['StockItemName']."</h3>
                <p>".$row['MarketingComments']."</p>
            </div>";
            }
        }else{
            echo "There are no results matching your search!";
        }
    }
    ?>
</div>