<!--#5FCF80 is color-->
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$plan=0;
session_Start();
$conn = new mysqli("localhost", "root", "", "expdb");
if(isset($_SESSION["plan"]))
$plan=$_SESSION["plan"];
?>
<style>
    
     @media screen and (max-width: 1000px) 
    {
    .coursecards {display:block;}
        .card{display: block;min-width: 300px;}
    
     }
    
     @media screen and (max-width: 1000px) 
    {
    #cform{min-width: 500px;}
        
    
     }
    
    
    
    
    
    
    .mouse
    {
        transform: rotate(90deg);
        background-color: black;
    }
    .price-table:hover
    {
       box-shadow: 5px 5px 5px lightgrey, -5px 0px 5px lightgrey;
    }
   .modal-header
    {
        background-color:#5FCF80;
        
    }
    .mybutton {
  border-radius: 0px 40px 40px 0px;
  background-color: #5FCF80;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.mybutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.mybutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.mybutton:hover span {
  padding-right: 25px;
}

.mybutton:hover span:after {
  opacity: 1;
  right: 0;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 20%;
  
    float:left;
      margin:8px;
    
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.cardcontainer {
    padding: 2px 16px;
  
    
}



.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
    float: left;
    margin: 5px;
    margin-left: 50px;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
color:white;
}
    img
    {
        width: 100%;
        height: 150px;
    }
    
      #cform
        {
            display: none;
            position: absolute;
            top:-20px;
            left:500px
            
        }

    
</style>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>connect+.com</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php"><span>Connect+</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="addcourse.php">Add Course</a></li>
            <li><a href="adminpanel.php">AdminPanel</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <h1 style="display:none" id="val"></h1>
  <!--/ Navigation bar-->
    
<br>
    <br>
<br>
    
    <script>
        	function showMessage(btnId)
            {			
                document.getElementById("val")
             
           // document.getElementById("cform").style.display="block";
                // document.getElementById("coursecards").style.display="none";
                
              //  document.getElementById("couselect").value=btnId;
                     // document.getElementById("couselect").readOnly=true;
                
                
            
                
                
			}
    </script>
   
    
<!--    payment form-->
<!--
      <form action="payment.php" method="get" id="cform">
    Username<input type="text" name="fname"><br>
    password<input type="text" name="pass"><br>
    Credit card Number<input type="text" name="cred"><br>
    Course Bought<input type="text" name="coursename" id="couselect"><br>

    <input type="submit">
</form>
--><div class="modal fade" id="login" role="dialog">
<div class="modal-dialog modal-sm">

<!-- Modal content no 1-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title text-center form-title" style="color:white;">Login</h4>
  </div>
  <div class="modal-body padtrbl">

    <div class="login-box-body">
      <p class="login-box-msg">Log in to start your session</p>
      <div class="form-group">
        <form  id="loginForm" action="loginltc.php" method="get" >
          <div class="form-group has-feedback">
            <!----- username -------------->
            <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname"/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-user form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
          <div class="form-group has-feedback">
            <!----- password -------------->
            <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pwd"/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox icheck">
                <label>
                          <input type="checkbox" id="loginrem" > Remember Me
                        </label>
              </div>
            </div>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-green btn-block btn-flat"  >Log In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>
<!--/ Modal box-->
<!--Banner-->

<!--    signup form-->
<div class="modal fade" id="signin" role="dialog">
<div class="modal-dialog modal-sm">

<!-- Modal content no 1-->
<div class="modal-content">
  <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
    <h4 class="modal-title text-center form-title" style="color:white;">Create Account</h4>
  </div>
  <div class="modal-body padtrbl">

    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div class="form-group">
        <form name="" id="loginForm" method="post" action="signupltc.php">
          <div class="form-group has-feedback">
            <!----- username -------------->
            <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname"/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
            <!---Alredy exists  ! -->
            <span class=" form-control-feedback glyphicon glyphicon-user" style="background-color: rgb(230,230,230);"></span>
          </div>
          <div class="form-group has-feedback">
            <!----- mail -------------->
            <input class="form-control" placeholder="E-mail"  type="text" autocomplete="off" name="email" />
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-envelope form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
          <div class="form-group has-feedback">
            <!----- password -------------->
            <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pass"/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox icheck">
                <label>
                          <input type="checkbox" id="loginrem" > Remember Me
                        </label>
              </div>
            </div>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-green btn-block btn-flat" >Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>

      
    <div class="modal-dialog modal-sm" id="cform">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title text-center form-title" style="color:white;">Payment Gateway</h4>            <button type="button" class="close" data-dismiss="modal" ><a href='viewcourse.php' style='font-size: 30px;color:black;float:right;'>&times;</a></button>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Please fill following deatils to procced</p>
            <div class="form-group">
              <form   action="payment.php" method="get" >
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname"/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
<!--                  password-->
                    <div class="form-group has-feedback">
                 
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pass"/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                  
                  
                  
                <div class="form-group has-feedback">
                  <!----- credit card number -------------->
                  <input class="form-control" placeholder="Credit card number" id="loginpsw" type="password" autocomplete="off" name="cred" min-length=6/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-credit-card form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                  
                   <div class="form-group has-feedback">
                  <!----- coursename -------------->
                  <input class="form-control" name="coursename" id="couselect" type="text" autocomplete="off" name="pwd"/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-education form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                  
                  
                  
                  
                  
                  
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                     
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat"  >Buy this course!</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php

if(isset($_POST["delete"]))
{
    $name=$_POST["title"];
    $query = "delete from courses where name='$name'";
    $sql_result1 = mysqli_query($conn, $query);


}
    ?>
    
    
    
    
    
    
    
    
    <div id="coursecards">
  <?php  
              $query1 = "select * from courses";
              $sql_result1 = mysqli_query($conn, $query1);
              while ($row = mysqli_fetch_assoc($sql_result1)) {
                $no=$row['no'];
                $name = $row['name'];
                $img = $row['image'];
                $pid = $row['id'];
                ?>
    <div class="card" >
    <form action="viewcourse.php" method="post">
  <img src='<?php echo "$img" ?>' alt="John" >
  <h1  ><?php echo "$name" ?></h1>
  <input type="text" name="title" style="display:none" value='<?php echo "$no" ?>'>
  <p class="title">CEO & Founder, Example</p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button type="submit" name="delete" id='<?php echo "$pid" ?>' >Delete Course</button></p>
              </form>
</div>
<?php
              }
?>
 
    </div>
    
    </body>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!--    php for calculating visits in courses-->
<?php

     
     if($_SERVER['REQUEST_METHOD']=="GET"){
       $localhost = "localhost";
       $usernamew = "root";
       $passwordw = "";
          $db = "expdb";
      $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
      if(!$conn){
       echo "Connection error";
       }
         else{
     
     $sql = "UPDATE counter SET visit=visit+1 WHERE id = 1";
    $result = mysqli_query($conn,$sql);
 }

}

?>
    
    
    
    
    
    
    
    
    