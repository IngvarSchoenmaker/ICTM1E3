
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connect = new mysqli($servername, $username, $password);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully";
?>

<?php
    if(isset($_POST["sale"]))
    {
        $sale_filter = implode("','", $_POST["sale"]);
        $query .= " SELECT * FROM .. WHERE .. = ('".$sale_filter."')";
    }
    if(isset($_POST["huismerk"]))
    {
        $huismerk_filter = implode("','", $_POST["huismerk"]);
        $query .= " SELECT * FROM .. WHERE .. =('".$huismerk_filter."')";
    }

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output .= '
   <div class="">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     <p>
     Sale : '. $row['product_sale'] .' <br />
     Bio Product : '. $row['product_bio'] .'<br />
     Huismerk : '. $row['product_huismerk'] .' 
     </p>
    </div>

   </div>
   ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;


?>