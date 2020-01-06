<?php
//functie die connectie legt met de database.
//gemaakt zodat je connectie kan leggen in een andere functie.



    if (!function_exists('get_connection')) {
        function get_connection()
        {
            $_database["server"] = "localhost";
            $_database["username"] = "root";
            $_database["password"] = "";
            $_database["name"] = "wwi_customers";
            $_database["poort"] = "3306";

            $conn = mysqli_connect($_database["server"], $_database["username"], $_database["password"], $_database["name"], $_database["poort"]);
            if ($conn->connect_error) {
                return die("Connection failed: " . $conn->connect_error);
            } else {
                return $conn;
            }
        }
    }



    if (!function_exists('GetData')) {
        function GetData($sql, $onlyOneRecord = false)
        {
            //Verbinding maken met de database
            //Query uitvoeren
            $conn = get_connection();
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            //Zet de results in een array
            $resultList = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $resultList[] = $row;
            }
            $conn->close();
            //Als de parameter van onlyonerecord op true staat
            //wordt er slechts 1 item terug gegeven.

            if ($onlyOneRecord && isset($resultList[0])) {
                return $resultList[0];
            }
            //anders
            return $resultList;
        }
    }