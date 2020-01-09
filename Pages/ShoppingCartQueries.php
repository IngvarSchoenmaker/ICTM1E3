<?php
session_start();
include '../incl/ConnectieFunctie.php';
include '../incl/db.php';
//  *** Verbindingsvariabelen voor SQL functies***
$customer_ID=$_SESSION['ID'];

$shoppinglist_ID = (SqlGetSingleRow("SELECT shoppinglist_ID FROM shoppinglist WHERE customer_ID ='$customer_ID'", $conn));
$shoppinglist_ID = implode('|',$shoppinglist_ID);
$_SESSION['cart_ID']=$shoppinglist_ID;
$cartproduct = GetData("SELECT ID_Product FROM shoppinglist WHERE Shoppinglist_ID='$shoppinglist_ID'", false);
$cartproduct=smallerArrayImplode($cartproduct);
foreach($cartproduct as $cartkey => $cartproductID){
    $quantity = GetData("SELECT Product_Quantity FROM shoppinglist WHERE Shoppinglist_ID='$shoppinglist_ID' AND ID_Product='$cartproductID'", true);
$quantity=implode('|',$quantity);
if(isset($_SESSION['cart'][$cartproductID])) {

} else {
    $_SESSION['cart'][$cartproductID] = $quantity;
}
}
if(!isset($_SESSION['cart'])){
    $_SESSION['check']=true;
    header("location: shoppingcart.php");
}
//  *** Voor elk item in de shoppingcart array wordt de informatie hier opgehaald en aan variabelen toegekend***
foreach ($_SESSION['cart'] as $ID => $aantal) {
    $unitPrice[$ID] = SqlGetSingleRow("SELECT UnitPrice FROM stockitems WHERE StockItemID = '$ID'", $conn2);
    $itemName[$ID] = SqlGetSingleRow("SELECT StockItemName FROM stockitems WHERE StockItemID = '$ID'", $conn2);
    $rating[$ID] = GetData("SELECT AVG(Stars) FROM Reviews WHERE ID_Product='$ID'", false);
    $photo[$ID] = GetData("SELECT Photo FROM product_information WHERE ID_Product='$ID'", false);
    $itemTotal[$ID] = $aantal * $unitPrice[$ID]['UnitPrice'];
}
//  *** Variabelen worden voor doorsturen in SESSIONS gezet***
$_SESSION['itemName']=$itemName;
$_SESSION['rating']=$rating;
$_SESSION['photo']=$photo;
$_SESSION['itemTotal'] = $itemTotal;
$_SESSION['itemPrice'] = $unitPrice;
//  *** Variabele SESSION 'check' op true zodat de site niet in een loop beland en maar 1 keer de informatie ophaalt***
$_SESSION['check']=true;

//  *** SESSIONS worden hier nagekeken en waar het binnen een array staat wordt deze opgebroken****
//  *** Uiteindelijk wordt alle info opgeslagen als [item]=>waarde***
$_SESSION['itemName'] = smallerArrayImplode($_SESSION['itemName']);
$_SESSION['itemPrice'] = smallerArrayImplode($_SESSION['itemPrice']);
$_SESSION['rating'] = arrayImplode($_SESSION['rating']);
$_SESSION['photo'] = arrayPhotoImplode($_SESSION['photo']);
foreach($_SESSION['rating'] as $starkey=>$starvalue){
    if($starvalue=='Niet beschikbaar'){
        $starvalue=0;
        $_SESSION['rating'][$starkey]=$starvalue;
    }
}

if($_SESSION['check']) {
    header("location: shoppingcart.php");
}


function smallerArrayImplode($array)
{
//    ***Haalt resultaten SQL queries uit elkaar en zet ze weer in elkaar zodat de key product_ID wordt***
//    ***Zelfde functie als bovenstaande ArrayImplode alleen uitvoerbaar op een array met minder onderliggende arrays***
    foreach ($array as $key => $value) {
        if ($value !== null) {
            foreach ($value as $key2 => $value2) {
                if ($value2 !== null) {
                    $result[$key] = $value2;
                } else {
                    $value2 = 'Niet beschikbaar';
                    $result[$key] = $value2;
                }
            }
        } else {
            $value = 'Niet beschikbaar';
            $result[$key] = $value;
        }
    }
    return ($result);
}

function arrayImplode($array)
{
//    ***Haalt resultaten SQL queries uit elkaar en zet ze weer in elkaar zodat de key product_ID wordt***
//    ***Zelfde functie als bovenstaande ArrayImplode alleen uitvoerbaar op een array met minder onderliggende arrays***
    foreach ($array as $key => $value) {
        if ($value !== null) {
            foreach ($value as $key2 => $value2) {
                if ($value2 !== null) {
                    foreach ($value2 as $key3 => $value3) {
                        if ($value3 !== null) {
                            $result[$key] = $value3;
                        } else {
                            $value3 = 'Niet beschikbaar';
                            $result[$key] = $value3;
                        }
                    }
                } else {
                    $value2 = 'Niet beschikbaar';
                    $result[$key] = $value2;
                }
            }
        } else {
            $value = 'Niet beschikbaar';
            $result[$key] = $value;
        }
    }
    return ($result);
}

function arrayPhotoImplode($array)
{
//    ***Haalt resultaten SQL queries uit elkaar en zet ze weer in elkaar zodat de key product_ID wordt***
//    ***Zelfde functie als bovenstaande ArrayImplode alleen specifiek voor de Photo SESSION omdat deze zich anders gedroeg bij opvragen***
    foreach ($array as $key => $value) {
        if(is_array($value)){
            if(empty($value)){
                $result[$key]='Foto niet Beschikbaar';
            } else {
                foreach ($value as $key2 => $value2) {
                    if (is_array($value2)) {
                        if (empty($value2)) {
                            $result[$key] = 'Foto niet Beschikbaar';
                        } else {
                            foreach ($value2 as $key3 => $value3) {
                                if (is_array($value3)) {
                                    if (empty($value3)) {
                                        $result[$key] = 'Foto niet Beschikbaar';
                                    }
                                } else {
                                    if($value3 != NULL){
                                        $result[$key] = $value3;
                                    } else {$result[$key] = 'Foto niet Beschikbaar';}

                                }
                            }
                        }
                    } else {
                        $result[$key] = $value2;
                    }
                }
            }
        }else {
            $result[$key]=$value;
        }
    }
    return($result);
}

function SqlGetSingleRow($sql, $conn)
{
//    ** DEZE FUNCTIE HAALT 1 WAARDE PER KEER UIT DE DOORGEGEVEN DATABASE **

    $statement = mysqli_prepare($conn, $sql);
    if ($statement === FALSE) {
        print($sql);
        die(mysqli_error($conn));
    }
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if ($result !== NULL) {
        while ($row = $result->fetch_assoc()) {
            return ($row);


        }
    }
    mysqli_stmt_close($statement);
    $conn->close();
}
?>