<?php
session_start();
include '../config/db.php';
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT COUNT(*) AS total FROM users WHERE email='$email'";
$sql_query = mysqli_query ($conn, $sql);
$row = mysqli_fetch_assoc($sql_query);
if ($row['total']==1){
    $sql_password = "SELECT * FROM users WHERE email='$email'";
    $sql_query_password = mysqli_query($conn, $sql_password);
    $rows = mysqli_fetch_assoc($sql_query_password);

    if(password_verify($password, $rows['password'])){


        header('location:../index.php');
        $_SESSION['login']='You are now logged in';
    }
    else{
        echo 'password not verified';
    }

}





?>