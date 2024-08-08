<?php 
include 'dbconnection.php'; 
$sql="select * from categories"; 
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
        <th colspan="5"><h2>Categories</h2></th> 
		</tr> 
          <tr>
              <th>Category ID</th>
			  <th>Category Name </th>
			  <th>Operations </th>
			  
		</tr> 
		
		<?php 
        while($rows=mysqli_fetch_assoc($result)) 
		{
            $catid = $rows['catid'];
             $catname = $rows['catname'];
           
            echo '<tr>
                <td>'.$catid.'</td>
                <td>'.$catname.'</td>
                <td><button><a href = "updatecat.php?updateid='.$catid.'">Update</a></button>
                    <button><a href = "deletecat.php?deleteid='.$catid.'">Delete</a></button>
                </td>
            </tr>';
        }
          ?> 

	</table>
    <center><button><a href = "insertcat.php">Add Category</a></button></center>
    
</section>
    

</body>

</html>
