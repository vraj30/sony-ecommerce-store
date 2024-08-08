<?php
    include 'dbconnection.php';
    if(isset($_GET['deleteid']))
       {
           $catid = $_GET['deleteid'];
           
           $sql = "delete from categories where catid = $catid";
           $result = mysqli_query($conn, $sql);
           if($result)
           {
               header('location:categories.php');
           }
           else{
               die(mysqli_error($conn));
           }
       }
?>