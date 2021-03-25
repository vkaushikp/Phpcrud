<?php

  include 'connect.php';
  
  $id = $_GET['id'];
   
    $q = mysqli_query($con,"DELETE FROM todo WHERE id=$id");

  header('location:index.php');
?>