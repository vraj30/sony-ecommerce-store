<?php
    include 'dbconnection.php';
    if(isset($_GET['deleteid']))
       {
           $srno = $_GET['deleteid'];
           
           $sql = "delete from users where srno = $srno";
           $result = mysqli_query($conn, $sql);
           if($result)
           {
               header('location:users.php');
           }
           else{
               die(mysqli_error($conn));
           }
       }
?>