<?php 
session_start();
include '../config/db.php';
$id=$_GET['id'];
$sql = "DELETE FROM `users` WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
if($query){
    header('location:./user.php');
    $_SESSION['delete']=$query;
}


?>