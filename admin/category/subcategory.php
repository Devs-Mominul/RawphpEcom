
<?php 
session_start();
include '../config/db.php';
$sql = "SELECT * FROM categories";
$queries = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="toastr.css" rel="stylesheet"/>


</head>
<body>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto ">
                <div class="card">
                    <div class="card-header">Add Subcategory</div>
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?=$_SESSION['success'] ?>
                        </div>
                    <?php endif; unset($_SESSION['success']); ?>
                    <div class="card-body">
                        <form action="./subc_post.php" method="post" >
                            <div class="mb-3">
                                <label for="name" class="form-label"> Subcategory name:</label>
                                <input type="text" name="category_name" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label"> Category Id:</label>
                                <select name="category_id" id="" class="form-control">
                                    <?php foreach($queries as $category) : ?>
                                    <option value="<?=$category['id'] ?>"><?=$category['category_name'];?></option>
                                    <?php endforeach; ?>
                                </select>
                               
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="toastr.js"></script>

<?php 
if(isset($_SESSION['success'])) :

?>
<script>
  toastr.info('Successfully')
</script>
<?php endif; session_unset(); ?>


</body>
</html>
