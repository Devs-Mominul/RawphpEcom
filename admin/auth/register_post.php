<?php 
include '../config/db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$hasError = false;
if(empty($name)){
    header('Location:./register.php');
    $_SESSION['name'] = 'Your name is required';
    $hasError = true;

}
if(empty($email)){
    if( filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location:./register.php');
        $_SESSION['email'] = 'Your email is Invalid';
       
    

    }
   

    header('Location:./register.php');
    $_SESSION['email'] = 'Your email is required';
    $hasError = true;

}

if(empty($password)){
    header('Location:./register.php');
    $_SESSION['password'] = 'Your password is required';
    $hasError = true;

}
if ($hasError) {
    header('Location:./register.php');
    exit();
}
else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$hashed_password')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('Location:../index.php');
    }
    else{
        header('Location:./register.php');

    }
   


}


?>