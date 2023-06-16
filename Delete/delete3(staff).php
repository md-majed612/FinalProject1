<?php
    include '../DbConnect/connection.php';
    //delete user
    $id = $_GET['id'];
    $userId = $_GET['userId'];
    $sql = "DELETE FROM price_table WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result) {
        header("Location: ../Product_price(staff).php?userId=$userId");
    } else {
        header("Location: ../Product_price(staff).php?success=0");
    }

    $con->close();
?>