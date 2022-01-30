    
<html>    
<style>
    body  
{  
    margin: 0;  
    padding: 0;  
    background-image: url('imperial.jpg');  
    font-family: 'blue';  
}  
.login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;  
        background: #23463f;  
        border-radius: 15px ;  
          
}  
h2{  
    text-align: center;  
    color: #277582;  
    padding: 20px;  
}  
label{  
    color: #08ffd1;  
    font-size: 17px;  
}  
#Uname{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
}  
#Pass{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
      
}  
#log{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    color: blue;  
  
  
}  
span{  
    color: white;  
    font-size: 17px;  
}  
a{  
    float: right;  
    background-color: grey;  
}  

</style>
</html>
<?php
session_start();
$_SESSION['session']=0;


echo "<head> <title>Imperial Banking</title>   </head>";    
echo "<body> <h2>Imperial Banking</h2><br> ";   
echo " <div class='login'>  <form id='login' method=POST> ";   
echo "<label><b>Customer ID </b></label>";    
echo"<input type='text' name='uname' id='uname' placeholder='Enter Customer-ID'>";    
echo"<br><br>";    
echo"<label><b>Password </b></label>";    
echo"<input type='Password' name='pass' id='pass' placeholder='Enter Password'><br><br>";    
echo"<input type='submit' name='log' id='log' value='Log In Here'><br><br><br><br>";    
echo"<a href='#'>Forgot Password</a></form></div></body>";

if(isset($_POST['log']))
{
$con= new mysqli("localhost","root","","term_project");
$u=$_POST['uname'];
$p=$_POST['pass'];
$sql="SELECT user_id,password from login where user_id=$u and password='".$p."'";
$result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['uid']=$_POST['uname'];
        header('Location:frontpage.php');
    }
}


?>
     