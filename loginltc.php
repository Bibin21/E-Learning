<?php
    session_start();
    
?>


<!--
<form action="loginltc.php" method="get">
    Name<input type="text" name="fname"><br>
    password<input type="text" name="pwd"><br>
   

    <input type="submit">
</form>
-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .card
    {
        position: relative;
        top:100px;
    }
    a,a:hover
    {
        text-decoration: none;
        color: white;
    }
      body
    {
        background: url('reviewback.jpg') no-repeat;
       
        
    }
</style>

<?php
if(isset($_GET['fname']))
{
$fname=$_GET["fname"];
$password=$_GET["pwd"];
if(($fname=="admin")&&($password=="admin"))
{
   
    $_SESSION["username"]=$fname;  
    echo"<center>"; 
       
    echo "<div class='card text-white bg-success mb-3' style='max-width: 18rem;'><div class='card-header'>Login Successfull!</div><div class='card-body'><h5 class='card-title'>Welcome , Admin</h5><p class='card-text'>We were waiting for you to check out your account </p><button class='btn-success'><a href='adminpanel.php'>My Account</a></button></div></div>";
    echo "</center>"; 

}
else{
$_SESSION['name']=$fname;
//$gen=$_GET["gender"];

if($fname=="" || $password=="")
{
    echo"<center>"; 
        echo "<div class='card text-white bg-danger mb-3' style='max-width: 18rem;'><div class='card-header'>Login unsuccessfull!</div><div class='card-body'><h5 class='card-title'>All inputs are neccessary!</h5><p class='card-text'>All inputs are necessary  to log into your  account</p><button class='btn-secondary'><a href='home.php'>Go Back</button></div></div>";
        echo "</center>";
}
else
{
    
if($_SERVER['REQUEST_METHOD']=="GET")//con establish
{
$localhost = "localhost";
$username = "root";
$passw = "";
$db = "expdb";
$conn = mysqli_connect($localhost,$username,$passw,$db);
if(!$conn){
echo "";
}
else
{
echo "";
}
$result=mysqli_query($conn,"select * from exptable where fname='$fname' and password='$password'")
				or die("FAILED!!".mysql_error());
	$row=mysqli_fetch_array($result);
    if($fname=='admin' and $password=='admin'){
		header("Location: adminpanel.php");
        echo "hello Admin";
	}
    else
      {
        $i=0;
if(isset($row['fname']))
{
    

	   if($row['fname']==$fname and $row['password']==$password) 
       {
           
           $i=1;
           
          $_SESSION["username"]=$fname;  
		echo"<center>"; 
    if($row['type']=='s')
    {
        echo "<div class='card text-white bg-success mb-3' style='max-width: 18rem;'><div class='card-header'>Login Successfull!</div><div class='card-body'><h5 class='card-title'>Welcome,".$_SESSION["username"]."</h5><p class='card-text'>We were waiting for you to check out your account </p><button class='btn-success'><a href='myaccount.php'>My Account</a></button></div></div>";
        echo "</center>";   
    }
    else
    {
      echo "<div class='card text-white bg-success mb-3' style='max-width: 18rem;'><div class='card-header'>Login Successfull!</div><div class='card-body'><h5 class='card-title'>Welcome,".$_SESSION["username"]."</h5><p class='card-text'>We were waiting for you to check out your account </p><button class='btn-success'><a href='dashboard.php'>Dashboard</a></button></div></div>";
      echo "</center>";   

    }
           
           
	  }
   
	 else{
		
		echo"<center>"; 
        echo "<div class='card text-white bg-danger mb-3' style='max-width: 18rem;'><div class='card-header'>Login Failed!</div><div class='card-body'><h5 class='card-title'>Username or Password is incorrect!!</h5><p class='card-text'>Looks like you have forgot your username or password </p><button class='btn-danger'><a href='forgotpassword.html'>Forgot Password!</a></button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn-secondary'><a href='home.php'>Go Back!</a></button></div></div>";
        echo "</center>"; 
	  }
    }
    else
    {
        echo"<center>"; 
        echo "<div class='card text-white bg-danger mb-3' style='max-width: 18rem;'><div class='card-header'>Login Failed!</div><div class='card-body'><h5 class='card-title'>Account Does Not Exist</h5><p class='card-text'>Looks like you have forgot your username or password </p><button class='btn-danger'><a href='forgotpassword.html'>Forgot Password!</a></button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn-secondary'><a href='home.php'>Go Back!</a></button></div></div>";
        echo "</center>"; 
    }
    }






    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}}}
if(isset($_SESSION["username"]))
  {
  $fname=$_SESSION["username"];
  $localhost = "localhost";
  $usernamew = "root";
  $passwordw = "";
     $db = "expdb";
 $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
  $sql = "select plan from propay where fname='$fname' order by id desc limit 1 ;";
  $result = mysqli_query($conn,$sql);
  $result = $result->fetch_array()[0];
  $plan=0;
  }
  if($result!=null)
  {
    echo "$result";
    if($result=="Pro Monthly")
    {
      $plan=1;
    }
    else if($result=="Pro Yearly")
    {
      $plan=2;
    }
   
  }
  else
  {
    $plan=0;
  }
  $_SESSION["plan"]=$plan;

}
?>