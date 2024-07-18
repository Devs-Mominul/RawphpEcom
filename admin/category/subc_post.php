<?php 
session_start();
include '../config/db.php';
$category_name = $_POST['category_name'];
$category_id = $_POST['category_id'];
$sql = "INSERT INTO `subcategories`( `subcategory_name`, `category_id`) VALUES ('$category_name', $category_id)";
$query = mysqli_query($conn, $sql);
if($query){
    header('location:./subcategory.php');
    $_SESSION['success']= 'Subcategory Added Successfully';
}



?>