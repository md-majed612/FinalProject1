<?php
    include '../DbConnect/connection.php';
    $userId = $_GET['userId'];
    
    $tests = [];
    $sql = "SELECT * FROM `bill` ORDER BY `id` DESC";
    $result = $con->query($sql);
    if($result){
      $tests = $result->fetch_all(MYSQLI_ASSOC);
    }

    foreach($tests as $test){
      $sql1 = "DELETE FROM `bill` WHERE id = '$test[id]'";
      $result1 = $con->query($sql1);
    }
    if($result1){
      header("Location: ../Purchase(staff).php?userId=$userId");
    }
    

    
    $con->close();
?>