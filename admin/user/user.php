
<?php
session_start();
include '../config/db.php';
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

</head>
<body>

<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
       
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $result) : ?>
      <tr>
        <td><?=$result['name'] ?></td>
        <td><?=$result['email'] ?></td>
        <td><a href="./delete.php?id=<?=$result['id'] ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php endforeach; ?>
    
    
    </tbody>
  </table>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<?php 
if(isset($_SESSION['delete'])) :

?>
<script>
  toastr.info('Delete Your User Account')
</script>
<?php endif; session_unset(); ?>

</body>
</html>
