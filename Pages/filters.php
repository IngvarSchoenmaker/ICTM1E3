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

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Filter neef</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/jquery-ui.css" rel="stylesheet">
</head>

<body>


<!-- Page Content -->

<div class="">
    <h3>Aanbieding</h3>
    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
        <?php

        $query = "";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            ?>
            <div class="">
                <label><input type="checkbox" class=""
                              value="<?php echo $row['product_sale']; ?>"> <?php echo $row['product_sale']; ?></label>
            </div>
            <?php
        }

        ?>
    </div>
</div>

<div class="">
    <h3>Bio product</h3>
    <?php

    $query = "";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        ?>
        <div class="">
            <label><input type="checkbox" class=""
                          value="<?php echo $row['product_bio']; ?>"> <?php echo $row['product_bio']; ?></label>
        </div>
        <?php
    }

    ?>
</div>

<div class="">
    <h3>Huismerk</h3>
    <?php
    $query = "";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        ?>
        <div class="">
            <label><input type="checkbox" class=""
                          value="<?php echo $row['product_huismerk']; ?>"> <?php echo $row['product_huismerk']; ?>
            </label>
        </div>
        <?php
    }
    ?>
</div>
</div>
</div>
</div>

</div>

<!--JavaScript voor de filters-->
<script>
    $(document).ready(function () {

        filter_data();

        function filter_data() {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var Aanbieding = get_filter('sale');
            var Bio = get_filter('bio');
            var Huismerk = get_filter('house');
            $.ajax({
                url: "fetch_data.php",
                method: "POST",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    sale: Aanbieding,
                    bio: Bio,
                    house: Huismerk
                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function () {
            filter_data();
        });

        // $('#price_range').slider({                       // Dit is  voor de AJAX slider, maar die heb ik zelf apart gemaakt
        //     range:true,
        //     min:1000,
        //     max:65000,
        //     values:[1000, 65000],
        //     step:500,
        //     stop:function(event, ui)
        //     {
        //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        //         $('#hidden_minimum_price').val(ui.values[0]);
        //         $('#hidden_maximum_price').val(ui.values[1]);
        //         filter_data();
    }
    })

    })
</script>

</body>

</html>