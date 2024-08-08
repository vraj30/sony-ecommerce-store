<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnection.php';     
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];
        
        $sql = "select *from users where emailid = '$emailid' AND password = '$password'";
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['emailid'] = $emailid;
            if($emailid == "admin" && $password == "admin")
            {
                header("location: admin.php");    
            }
            else if($num == 1)
            {
                header("location: welcome.php");    
            }
            
            
        }
   
    else
    {
            $showError = "Invalid credentials";

    }
    
}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title> Login Page </title>  
<style>   
  
</style>   
</head>    
<body>
  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>You are logged in!
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
    <center> <h1> Login </h1> </center>   
    <form action="/phpwebiste/login.php" method = "post">  
      <div class="container">   
       <table align= "center">
            <tr>
                <td><label>Email Id : </label>  </td>
                <td> <input type="text" placeholder="Enter Email Id" name="emailid" id = "emailid"> </td>
            </tr>
            
            <tr>
                <td><label>Password : </label></td>
                <td> <input type="password" placeholder="Enter Password" name="password" id = "password">  </td>
            </tr>
            
             <tr>
                <td><button type="submit">Login</button></td> 
                <td><a href = "signup.php">Don't have an account?</a></td> 
            </tr>
             
            
            
           
               
         
        </table> 
        </div> 
    </form>    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
</body>     
</html>