<?php
include 'dbconnection.php';
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    include 'dbconnection.php';
    $prodid = $_POST["prodid"];
    $prodimg = $_POST["prodimg"];
    $prodname = $_POST["prodname"];
    $prodprice = $_POST["prodprice"];
    $catid = $_POST["catid"];
    $existSql = "SELECT * FROM `products` WHERE prodid = '$prodid'";
    $result = mysqli_query($conn,$existSql);
    $numExistRow = mysqli_num_rows($result);
    
    if($numExistRow > 0)
    {
            $showError = "Product already exist!";
    }
    else
    {
        $sql = "INSERT INTO `products` (`prodID`, `prodImg`, `prodName`, `prodPrice`,`catid` ) VALUES ($prodid, '$prodimg', '$prodname', $prodprice, $catid)";
        $result = mysqli_query($conn, $sql);
        
        if($result)
        {
            $showAlert = true;
            header('location:products.php');
        }

    
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
  <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product Added!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    
    <center> <h1> Add Product </h1> </center>   
    <form method = "post">  
      <div class="container">   
       <table align= "center">
            <tr>
                <td><label>Product Id : </label>  </td>
                <td> <input type="text" placeholder="Enter Product Id" name="prodid" id = "prodid"> </td>
            </tr>
            
            <tr>
                <td><label>Product Image : </label></td>
                <td> <input type="file" name="prodimg" id = "prodimg">  </td>
            </tr>
             <tr>
                <td><label>Product Name : </label></td>
                <td> <input type="text" placeholder="Enter Product Name" name="prodname" id = "prodname">  </td>
            </tr>
             <tr>
                <td><label>Product Price : </label></td>
                <td> <input type="number" placeholder="Enter Product Price" name="prodprice" id = "prodprice">  </td>
            </tr>    
             <tr>
                <td><label>Category ID: </label></td>
                <td> <select name = "catid">
                        <option value = "" selected disabled>Select Category ID </option>
                        <?php
                            $sql = "select *from categories";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $catid = $row['catid'];
                                echo "<option value='$catid'>$catid</option>";
                            }
                        ?> 
                     </select> 
                </td>
            </tr>
             <tr>
                <td><button type="submit">Add</button></td> 
                 
            </tr>
             
        </table> 
        </div> 
    </form> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>     
</html>