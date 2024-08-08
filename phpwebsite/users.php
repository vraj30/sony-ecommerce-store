<?php 
include 'dbconnection.php'; 
$sql="select * from users"; 
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
        <th colspan="4"><h2>User Records</h2></th> 
		</tr> 
          <tr>
              <th>Sr No.</th>
			  <th> Email ID </th> 
			  <th> PassWord </th>
			  <th>Operations</th>
		</tr> 
		
		<?php 
        while($rows=mysqli_fetch_assoc($result)) 
		{
            $srno = $rows['srno'];
            $emailid = $rows['emailid'];
            $password = $rows['password'];
            echo '<tr>
                <td>'.$srno.'</td>
                <td>'.$emailid.'</td>
                <td>'.$password.'</td>
                <td><button><a href = "update.php?updateid='.$srno.'">Update</a></button>
                    <button><a href = "delete.php?deleteid='.$srno.'">Delete</a></button>
                </td>
            </tr>';
        }
          ?> 

	</table> 

    
</section>
    

</body>

</html>
