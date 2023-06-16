<?php
    include '../DbConnect/connection.php';
    //delete user
    $id = $_GET['id'];
    $userId = $_GET['userId'];
    $sql = "DELETE FROM bill WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result) {
        header("Location: ../Purchase(staff).php?userId=$userId");
    } else {
        header("Location: ../Purchase(staff).php?success=0");
    }

    $con->close();
?>