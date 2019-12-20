<?php
function getSuggestions($id, $conn, $conn2)
{
    $sql = "SELECT ID_Product FROM shoppinglist WHERE Shoppinglist_ID = (SELECT Shoppinglist_ID FROM customer WHERE Customer_ID = ?) AND date = (SELECT MAX(Date) FROM customer WHERE Customer_ID = ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $id, $id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            // Check number of rows in the result set
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);

                $sql2 = "SELECT StockItemName FROM stockitems WHERE tags LIKE (SELECT tags FROM stockitems WHERE StockItemID = ? ) LIMIT 3";
                if ($stmt2 = mysqli_prepare($conn2, $sql2)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt2, "s", $row[0]);

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt2)) {
                        $result2 = mysqli_stmt_get_result($stmt2);
                        // Check number of rows in the result set
                        if (mysqli_num_rows($result2) > 0) {
                            $arr = [];
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $arr[] = $row2;
                            }
                            return $arr;
                        }
                    }
                } else {
                    return "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                // return results

            } else {
                return "found null";
            }
        } else {
            return "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}