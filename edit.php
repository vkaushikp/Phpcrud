<!DOCTYPE html>
<html>
<head>
     <title>edit</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php 

  include 'connect.php';


  if (isset($_POST['submit'])) 
  {
  	$id = $_GET['id'];
  	$item = $_POST['item'];
  	$qty = $_POST['qty'];

          mysqli_query($con,"UPDATE todo SET id=$id,item='$item',quantity= '$qty' WHERE id=$id ");

          header('location:index.php');	
  }
?>
<div class="box">
     <h2 class="text-center m-4">Update Items</h2>
    <div class="d-flex align-items-center justify-content-center flex-column">
        <form action="" method="post" class="w-50 form-fle">
        <div class="form-group">
            <label for="items">Items</label>
            <input type="text" name="item" class="form-control w-100" placeholder="Enter items" id="items" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" name="qty" class="form-control w-100" placeholder="Enter quantity" id="qty" autocomplete="off" required>
        </div>
        <div class="flex-row mt-3">
            <button type="submit" name="submit" class="btn btn-success">UPDATE</button>
        </div>
        </form>
    </div>
        </form>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>