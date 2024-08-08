<?php
    include 'dbconnection.php';
    if(isset($_GET['deleteid']))
       {
           $prodid = $_GET['deleteid'];
           
           $sql = "delete from products where prodid = $prodid";
           $result = mysqli_query($conn, $sql);
           if($result)
           {
               header('location:products.php');
           }
           else{
               die(mysqli_error($conn));
           }
       }
?>