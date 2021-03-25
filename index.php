<?php
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>PHP Crud Operation</title>
    <style>
    #src
    {
        margin-left: 85vh;
        display: flex;
    }
    #src button 
    {
        padding: 7px 20px;
        border-radius: 0px 5px 5px 0px; 
        background: var(--blue);
        color: white;
        outline: none;
        border: none;
    }
    </style>
</head>
<body>
    <h2 class="text-center m-4">TODO List</h2>
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
            <button type="submit" name="add" class="btn btn-primary">ADD</button>
            <a href="index.php" class="btn btn-warning text-decoration-none text-white">REFRESH</a>
        </div>
        </form>
    </div>
        <form action="" method="post"> 
        <div class="form-group" id="src">
            <input type="text" name="search" id="search" class="form-control w-50" placeholder="search here..." required>
            <button type="submit" name="submit">Search</button>
        </div>
        </form>

<?php

   if (isset($_POST['add'])) 
   {
       $sql = "INSERT INTO `todo` VALUES('','$_POST[item]','$_POST[qty]')";
       $res = mysqli_query($con,$sql);
       ?>  
        <script>
            window.location = "index.php";
        </script>
        <?php
    }
    if (isset($_POST['submit'])) 
    {
      $result = mysqli_query($con,"SELECT * FROM `todo` where item like '%$_POST[search]';");

            if (mysqli_num_rows($result)==0) 
            {?>

                <div class="alert alert-danger m-5 text-center"><h4>Sorry Not Found Data.Try Somthing Different😔</h4></div>
                
            <?php
            }
       else
       {

           ?>
           <div class="d-flex align-items-center justify-content-center mt-3">
                <table class="table border-2 w-50 table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
            <?php
              while ($row = mysqli_fetch_array($result)) 
              {
                  
                  ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['item']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><button type="submit" name="delete" class="btn btn-danger"><a href="delete.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">Delete</a></button></td>
                            <td><button class="btn btn-success"><a href="edit.php?id=<?php echo $row['id']; ?>" class="text-white text-decoration-none">Edit</a></button></td>
                        </tr>
           <?php
                }
                ?>
                  </table>
                  </div>
                <?php
       }
    }
    else
       {
           $q = mysqli_query($con,"SELECT * FROM todo ");

           ?>
           <div class="d-flex align-items-center justify-content-center mt-3">
                <table class="table border-2 w-50 table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
            <?php
              while ($row = mysqli_fetch_array($q)) 
              {
                  
                  ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['item']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><button type="submit" name="delete" class="btn btn-danger"><a href="delete.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">Delete</a></button></td>
                            <td><button class="btn btn-success"><a href="edit.php?id=<?php echo $row['id']; ?>" class="text-white text-decoration-none">Edit</a></button></td>
                        </tr>
           <?php
                }
                ?>
                  </table>
                  </div>
                <?php
       }

?>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>