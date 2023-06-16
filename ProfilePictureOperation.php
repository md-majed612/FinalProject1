<?php

include 'DbConnect/connection.php';

if(isset($_REQUEST['profile_picture_save']) && isset($_FILES['image'])){

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $fileName = $_FILES['image']['name'];
    $ext = substr(strrchr($fileName, '.'), 1);

    $imageName = date("YmdHis") . "." . $ext;
    $tmpName = $_FILES['image']['tmp_name'];
    $uploc = 'img/profile_picture/' . $imageName;

    $sql = "UPDATE `registered_user` SET `profile_picture` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 's', $imageName);

    if (mysqli_stmt_execute($stmt)) {
        move_uploaded_file($tmpName, $uploc);
        header("Refresh:0");
        $_SESSION['profile_picture'] = $imageName;
        echo "<script>alert('Profile Picture Uploaded!')</script>";
    } else {
        echo "<script>alert('Profile Picture Did Not Upload!')</script>";
    }
}

?>
