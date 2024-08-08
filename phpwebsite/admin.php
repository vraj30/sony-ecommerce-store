<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
    {
        header("location : login.php");
        exit;
    }
    
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
    
    <section class = "main">
       
        
    </section>

    

</body>

</html>