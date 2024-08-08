<?php 
include 'dbconnection.php'; 
$sql="select * from products"; 
$result=mysqli_query($conn,$sql); 
?> 


<html>

<head>

    <link rel="stylesheet" href="wstyle.css">
</head>

<body>
    
    <section class="header">
        <nav>

            <p class="logo">SONY</p>
            <div class="nav-link" id="navlink">
                <i class="fa fa-times" onclick="hidemenu()"></i>
                <ul>
                    <li><a href="admin.php">HOME</a></li>
                    <li><a href="users.php">USERS</a></li>
                    <li><a href="categories.php">CATEGORIES</a></li>
                    <li><a href="products.php">PRODUCTS</a></li>
                    <li><a href="login.php" style="color: #01FE23">LOG OUT</a></li>
                </ul>
            </div>
        </nav>
    </section>
    
    
      <section style="">
      
        <table border="1px" style="width:100%; line-height:40px;"> 
	    <tr> 
        <th colspan="6"><h2>Products</h2></th> 
		</tr> 
          <tr>
              <th>Product ID</th>
			  <th>Product Image </th>
			  <th>Product Name</th>
			  <th>Product Price</th>
			  <th>Category ID</th>
			  <th>Operations</th>    
			  
		</tr> 
		
		<?php 
        while($rows=mysqli_fetch_assoc($result)) 
		{
            $prodid = $rows['prodID'];
            $prodimg = $rows['prodImg'];
            $prodname = $rows['prodName'];
            $prodprice = $rows['prodPrice'];
            $catid = $rows['catid'];
           
            echo '<tr>
                <td>'.$prodid.'</td>
                <td><img src = '.$prodimg.' height = "100px" width = "100px"></td>
                <td>'.$prodname.'</td>
                <td>'.$prodprice.'</td>
                <td>'.$catid.'</td>
                <td><button><a href = "updateprod.php?updateid='.$prodid.'">Update</a></button>
                    <button><a href = "deleteprod.php?deleteid='.$prodid.'">Delete</a></button>
                </td>
            </tr>';
        }
          ?> 

	</table>
          <center><button ><a href = "insertprod.php">Add Product</a></button></center>
    
</section>
    

</body>

</html>
