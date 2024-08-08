<?php
include 'dbconnection.php';
$srno = $_GET['updateid'];
$sql1 = "select *from users where  srno = $srno";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $emailid = $row['emailid'];
    $password = $row['password'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];
    $sql = "update users set srno=$srno,emailid = '$emailid', password = '$password' where srno = $srno";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header('location:users.php');
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
<title> Login Page </title>  
<style>   
  
</style>   
</head>    
<body>
    <center> <h1> Update Data </h1> </center>   
    <form method = "post">  
      <div class="container">   
       <table align= "center">
            <tr>
                <td><label>Email Id : </label>  </td>
                <td> <input type="text" name= "emailid" id = "emailid" value = <?php echo $emailid;?>> </td>
            </tr>
            
            <tr>
                <td><label>Password : </label></td>
                <td> <input type="text" name="password" id = "password" value = <?php echo $password;?>>  </td>
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