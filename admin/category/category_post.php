<?php 
session_start();
include '../config/db.php';

$name=$_POST['name'];
$img=$_FILES['img'];
$after_explode=explode('.',$img['name']);
$extension= end($after_explode);
$file_name=strtolower(str_replace(' ','-',$name)).'-'.random_int(100000,900000).'.'.$extension;

$new_location ='../uploads/category/'.$file_name;
move_uploaded_file( $img['tmp_name'],$new_location);

$sql = "INSERT INTO `categories`( `category_name`, `category_img`) VALUES ('$name', '$file_name')";
$store=mysqli_query($conn,$sql);
if($store){
    header('location:./category.php');
    $_SESSION['success']=$store;
}


?>