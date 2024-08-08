<?php
include 'dbconnection.php';
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
    {
        header("location : login.php");
        exit;
    }
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/59903bd32a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="wstyle.css">
    <style>
.card {
  border: 1px solid;
  width: 350px;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: block;
    float: left;
    margin-left: 50px;
    margin-top: 60px;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
ul li
{
  display: block;
  list-style-type: none;
}

    </style>
</head>

<body>
    
    <section class="header">
        <nav>

            <p class="logo">SONY</p>
            <div class="nav-link" id="navlink">
                <ul>
                    <li><a href="welcome.php">HOME</a></li>
                    <li><a href="cart.php">CART</a></li>
                    <li><a href="login.php" style="color: #01FE23">LOG OUT</a></li>
                </ul>
            </div>


        </nav>

    </section>

    <section class="category">
       
        <div class="dropdown">
            <button class="dropbtn">Categories <i class="fa-solid fa-caret-down"></i></button>
            <div class="dropdown-content">
               <?php
                    $sql = "select *from categories";
                    $result = mysqli_query($conn, $sql);
                   
                    while( $row = mysqli_fetch_assoc($result))
                    {
                        $catname = $row['catname'];
                        $catid = $row['catid'];
                        echo "<li style = 'list-style-type: none;'>
                                <a href = 'welcome.php?catid=$catid'>$catname</a>
                            </li>";
                    }
                ?>

            </div>
        </div>

    </section>

<section class ="products">
  <?php
      if(!isset($_GET['catid']))
      {
        $sql = "select *from products limit 0,6";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $prodid = $row['prodID'];
            $prodimg = $row['prodImg'];
            $prodname = $row['prodName'];
            $prodprice = $row['prodPrice'];
            $catid = $row['catid'];

            echo " <ul>
                    <li>
                        <div class='card'>
                            <img src='$prodimg' width ='150px' height='150px'>
                            <h1>$prodname</h1>
                            <p class='price'>Price : $prodprice Rs</p>
                            <p><button>Add to Cart</button></p>
                        </div>
                    </li>
                  </ul>";

        }
      }
    else
    {
        $cate_id = $_GET['catid'];
        $sql = "select *from products where catid = $cate_id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $prodid = $row['prodID'];
            $prodimg = $row['prodImg'];
            $prodname = $row['prodName'];
            $prodprice = $row['prodPrice'];
            $catid = $row['catid'];

            echo " <ul>
                    <li>
                        <div class='card'>
                            <img src='$prodimg' width ='150px' height='150px'>
                            <h1>$prodname</h1>
                            <p class='price'>Price : $prodprice Rs</p>
                            <p><button>Add to Cart</button></p>
                        </div>
                    </li>
                  </ul>";
    }
    }
    ?>
</section>
</body>

</html>