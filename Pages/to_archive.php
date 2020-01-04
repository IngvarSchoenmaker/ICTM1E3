<?php
include '../incl/db.php';
?>
<?php
//stuurt alles naar de archives zodra het een datum heeft verlopen
$sql = "SELECT * FROM customer where Validation = 0";
$result = mysqli_query($conn, $sql);
foreach($result as $t) {
    if($t['Verloop'] === date('d/m/Y')){
        $id = $t['Customer_ID'];
        $sqlin = "INSERT INTO customer_archive SELECT * FROM customer WHERE Customer_ID = $id";
        mysqli_query($conn, $sqlin);
        $sqldel = "DELETE FROM customer WHERE Customer_ID = $id";
        mysqli_query($conn, $sqldel);
        echo "U account is verlopen";
    } elseif($t['Verloop'] === "10/12/2019"){
        //bruh
    } else {
        echo "Vergeet niet u account to valideren";
    }
}
?>
