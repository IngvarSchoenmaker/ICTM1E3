<?php
include "../incl/db.php";
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";
$connWWI = mysqli_connect($servername, $DBusername, $DBpassword, "wideworldimporters", $port) or
die("Could not connect: " . mysqli_error());
$connOnzeDB = mysqli_connect($servername, $DBusername, $DBpassword, "onzedbwwi", $port) or
die("Could not connect: " . mysqli_error());

//// vraag van de database de productenlijst voor deze bezoeker op.voor nu als voorbeeld onderstaande productenlijst.
$_SESSION['shoppinglist_ID']=2;
$productenlijstID=$_SESSION['shoppinglist_ID'];

function SqlGetSingleRow($sql, $conn)
{
//    ** DEZE FUNCTIE HAALT 1 WAARDE PER KEER UIT DE WWI DATABASE **

    $statement = mysqli_prepare($conn, $sql);
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if($result!== NULL) {
        while ($row = $result->fetch_assoc()) {
            return ($row);


        }
    }
    mysqli_stmt_close($statement);
    $conn->close();
}

function SqlGetRows($sql,$conn)
{
//    ** DEZE FUNCTIE HAALT MEERDERE WAARDE PER KEER UIT DE ONZE DATABASE **
    $servername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname= "onzedbwwi";
    $port = "3306";

    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port) or
    die("Could not connect: " . mysqli_error());


    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    while ($rows[] = mysqli_fetch_assoc($result)) {
        return ($rows);
            }
    mysqli_stmt_close($statement);


    $conn->close();

}

Function ArrayImplode($array)
{
//       ** DEZE FUNCTIE IMPLODE EEN ARRAY VAN tot één array en kent de uitkomst toe aan keys 0,1,2,... **
    $i=0;
    $o=0;
    foreach ($array as $key => $value) {
        $o += 1;
        foreach ($value as $key2 => $value2) {
            if (!$value2 == NULL) {
                $result[$i] = (implode('|', $value2));
            }
            $i += 1;
        }
    }
    return($result);
}

//      *** Items uit winkelwagen worden opgevraagd van de database en in bruikbare array gezet***
$itemList[]=SqlGetRows("SELECT ID_Product FROM shoppinglist WHERE Shoppinglist_ID = '$productenlijstID'",$connOnzeDB);
foreach($itemList as $key => $value){
    foreach($value as $key2 => $value2){
        if(empty($value2)) {
            print("array is empty.");
            $_SESSION['Querycheck']=true;
            header("Location: shoppingcart.php");
            exit;
        }else {
            $itemList[$key] = ($value2);
            foreach($value2 as $key4 => $value4) {
                $productList[$value4] = implode('|',SqlGetSingleRow("SELECT Product_Quantity FROM shoppinglist WHERE Shoppinglist_ID=$productenlijstID AND ID_Product= $value4",$connOnzeDB));
            }
        }
    }
};








//      *** Voor elk product dat in de winkelwagen staat wordt de nodige informatie opgevraagt.***
foreach($productList as $ID => $aantal) {
    $unitPrice[$ID] = SqlGetSingleRow("SELECT UnitPrice FROM stockitems WHERE StockItemID = '$ID'",$connWWI);
    $itemName[$ID] = SqlGetSingleRow("SELECT StockItemName FROM stockitems WHERE StockItemID = '$ID'",$connWWI);
    $photo[$ID]= SqlGetSingleRow("SELECT Photo FROM product_information WHERE ID_Product='$ID'",$connOnzeDB);
//    if(SqlGetSingleRow("SELECT "))
    $rating[$ID]=SqlGetSingleRow("SELECT AVG(Stars) FROM Reviews WHERE ID_Product='$ID'",$connOnzeDB);
//    $rating[$ID]=SqlGetSingleRow("SELECT review FROM shoppinglist WHERE Shoppinglist_ID=$productenlijstID AND ID_Product='$ID' ",$connOnzeDB);
    $itemTotal[$ID]= $aantal * implode('|', $unitPrice[$ID]);



}


function smallerArrayImplode($array){
//    ***Haalt resultaten SQL queries uit elkaar en zet ze weer in elkaar zodat de key product_ID wordt***
//    ***Zelfde functie als bovenstaande ArrayImplode alleen uitvoerbaar op een array met minder onderliggende arrays***
    foreach($array as $key => $value){
        foreach($value as $key2 => $value2){
            if(!$value2 == NULL) {
            $waarde = $value2;
            $result[$key] = $waarde;
        } else {
                $waarde = 'NOT AVAILABLE';
                $result[$key] = $waarde;
            }

        }

    }

    return($result);
}
$unitPrice=smallerArrayImplode($unitPrice);
$itemName=smallerArrayImplode($itemName);
$photo=smallerArrayImplode($photo);
$rating=smallerArrayImplode($rating);


//      *** Info in sessions voor gebruik shoppingcart zelf ***
$_SESSION['itemPrice']=$unitPrice;
$_SESSION['itemName']=$itemName;
$_SESSION['itemPhoto']=$photo;
$_SESSION['itemRating']=$rating;
$_SESSION['itemTotalPrice']=$itemTotal;
$_SESSION['cart'] =$productList;
    $_SESSION['Querycheck']=true;
    header("Location: shoppingcart.php");
//    exit;

?>