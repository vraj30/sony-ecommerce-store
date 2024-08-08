<?php
include 'dbconnection.php';
$catid = $_GET['updateid'];
$sql1 = "select *from categories where  catid = $catid";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $catid = $row['catid'];
    $catname = $row['catname'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
    $catid = $_POST["catid"];
    $catname = $_POST["catname"];
    $sql = "update categories set catid=$catid, catname = '$catname' where catid = $catid";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header('location:categories.php');
    }
    else
    {
        
    }
    
}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
</head>    
<body>
    <center> <h1> Update Category </h1> </center>   
    <form method = "post">  
      <div class="container">   
       <table align= "center">
            <tr>
                <td><label>Category Id : </label>  </td>
                <td> <input type="text" name= "catid" id = "catid" value = <?php echo $catid;?>> </td>
            </tr>
            
            <tr>
                <td><label>Password : </label></td>
                <td> <input type="text" name="catname" id = "catname" value = <?php echo $catname?>>  </td>
            </tr>
            
             <tr>
                <td><button type="submit">Update</button></td> 
                
            </tr>
             
            
            
           
               
         
        </table> 
        </div> 
    </form>    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
</body>     
</html>