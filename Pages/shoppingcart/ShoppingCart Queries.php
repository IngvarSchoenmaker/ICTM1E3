<?php
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
$productenlijstID=1;

function SqlGetSingleRow($sql, $conn)
{
//    ** DEZE FUNCTIE HAALT 1 WAARDE PER KEER UIT DE WWI DATABASE **

    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    while ($row = $result->fetch_assoc()) {
        return($row);


    }
    mysqli_stmt_close($statement);
    $conn->close();
}

function SqlGetRows($sql)
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

            }

    return ($rows);
    mysqli_stmt_close($statement);
    $conn->close();

}

Function ArrayImplode($array)
{
//       ** DEZE FUNCTIE IMPLODE EEN ARRAY VAN SqlonzeDB tot één array en kent de uitkomst toe aan keys 0,1,2,... **
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
//// in $itemList array worden de producten gezet die in de winkelwagen staan.

$totaalPrijs=0;

$itemList[]=SqlGetRows("SELECT ID_Product FROM shoppinglist WHERE Shoppinglist_ID = '$productenlijstID'");

$itemList=(ArrayImplode($itemList));



foreach($itemList as $key4 => $value4) {
    $productList[$value4] = implode('|',SqlGetSingleRow("SELECT Product_Quantity FROM shoppinglist WHERE Shoppinglist_ID=$productenlijstID AND ID_Product= $value4",$connOnzeDB));
}
$_SESSION['cart'] =$productList;






//// Hieronder Worden voor de items die in de itemList staan gekeken welke informatie ervan nodig is.
foreach($productList as $ID => $aantal) {
    $unitPrice[$ID] = SqlGetSingleRow("SELECT UnitPrice FROM stockitems WHERE StockItemID = '$ID'",$connWWI);
    $itemName[$ID] = SqlGetSingleRow("SELECT StockItemName FROM stockitems WHERE StockItemID = '$ID'",$connWWI);
    $photo[$ID]= SqlGetSingleRow("SELECT Photo FROM product_information WHERE ID_Product='$ID'",$connOnzeDB);
    $review[$ID]= implode('|',SqlGetSingleRow("SELECT Review FROM Shoppinglist WHERE ID_Product='$ID'",$connOnzeDB));
    $rating[$ID]=SqlGetSingleRow("SELECT review FROM shoppinglist WHERE Shoppinglist_ID=$productenlijstID AND ID_Product='$ID' ",$connOnzeDB);
    $itemTotal[$ID]= $aantal * implode('|', $unitPrice[$ID]);


//    $itemPrijs= implode('|', $unitPrice[$ID]);
//    $itemTotaal= $aantal * implode('|', $unitPrice[$ID]);
//    $itemNaam = implode('|', $itemName[$ID]);
//    $totaalPrijs=($totaalPrijs+$itemTotal[$ID]);
//    $foto=implode('|',$photo[$ID]);
//    $review=$review[$ID];
//    $beoorderling=$rating[$ID];
//
//    print("Product " . $itemNaam . "<BR>");
//    print("Aantal: " . $aantal . "<BR>");
//    print("Per stuk: " . $itemPrijs . "<BR>");
//    print("Prijs: " . $itemTotaal . "<BR>");
//    print("Totaal prijs: " . $totaalPrijs . "<BR>");
//    print($review . "<BR>");
//    print($foto);

    print("<BR><BR>");
}
//    ***Voor gebruik layout in sessions**8


function smallerArrayImplode($array){
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


$_SESSION['itempPrice']=$unitPrice;
$_SESSION['itemName']=$itemName;
$_SESSION['itemPhoto']=$photo;
print_r($_SESSION['itemPhoto']);
$_SESSION['itemRating']=$rating;
$_SESSION['itemTotalPrice']=$itemTotal;


?>