<?php
include 'dbconnection.php';
$prodid = $_GET['updateid'];
$sql1 = "select *from products where  prodid = $prodid";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $prodid = $row['prodID'];
    $prodimg= $row['prodImg'];
    $prodname= $row['prodName'];
    $prodprice= $row['prodPrice'];
    $catid= $row['catid'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
    $prodid = $_POST["prodid"];
    $prodimg = $_POST["prodimg"];
    $prodname = $_POST["prodname"];
    $prodprice = $_POST["prodprice"];
    $catid = $_POST["catid"];
    
    $sql = "update products set prodID=$prodid, prodImg = '$prodimg', prodName = '$prodname', prodPrice = $prodprice,catid = $catid where prodid = $prodid";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header('location:products.php');
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
    <center> <h1> Update Product </h1> </center>   
    <form method = "post">  
      <div class="container">   
       <table align= "center">
            <tr>
                <td><label>Product Id : </label>  </td>
                <td> <input type="text" name= "prodid" id = "prodid" value = <?php echo $prodid;?>> </td>
            </tr>
            
            <tr>
                <td><label>Product Image : </label>  </td>
                <td> <input type="file" name= "prodimg" id = "prodimg" value = <?php echo $prodimg;?>> </td>
            </tr>
            <tr>
                <td><label>Product Name : </label>  </td>
                <td> <input type="text" name= "prodname" id = "prodname" value = <?php echo $prodname;?>> </td>
            </tr>
            <tr>
                <td><label>Product Price : </label>  </td>
                <td> <input type="number" name= "prodprice" id = "prodprice" value = <?php echo $prodprice;?>> </td>
            </tr>
            <tr>
                <td><label>Category Id : </label>  </td>
                <td> <input type="text" name= "catid" id = "catid" value = <?php echo $catid;?>> </td>
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