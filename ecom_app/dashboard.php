<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('location:./Auth/login.php');
}
include './header/header.php'
?>
<?php 
include './admin/master/master.php'
?>


<?php 
include './footer/footer.php'
?>