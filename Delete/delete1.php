<?php
    include '../DbConnect/connection.php';
    //delete user
    $id = $_GET['id'];
    $userId = $_GET['userId'];
    $sql = "DELETE FROM dashboard_table WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result) {
        header("Location: ../Dashboard.php?userId=$userId");
    } else {
        header("Location: ../Dashboard.php?success=0");
    }

    $con->close();
?>