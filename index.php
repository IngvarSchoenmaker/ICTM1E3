<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="db.php">
</head>
<body>
 <form action="search.php" method="POST">
     <input type="text" name="search" placeholder="Search">
     <button type="submit" name="submit-search">Search</button>
 </form>
<h1>Front page</h1>
<h2>All articles:</h2>
<div class="article-container">
    <?php
        $sql = "SELECT * FROM stockitems";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
    if($queryResults > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<div>
                <h3>".$row['StockItemName']."</h3>
                <p>".$row['MarketingComments']."</p>
            </div>";
        }
    }
    ?>
</div>
</body>
</html>