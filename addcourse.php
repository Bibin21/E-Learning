<!DOCTYPE html>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php
$conn = new mysqli("localhost", "root", "", "expdb");
if(isset($_POST["btn"]))
{
    $cname=$_POST["name"];
    $cid=$_POST["id"];
    $image=$_POST["img"];
    $link=$_POST["link"];
    $var=$_POST["var"];
    $query = "insert into courses(name,id,image,pro) values('$cname','$cid','$image','$var')";
    $sql_result1 = mysqli_query($conn, $query);
    $query1 = "insert into coursevideo values('$cid','$link')";
    $sql_result1 = mysqli_query($conn, $query1);
}
?>
<body>

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
            <li><a href="viewcourse.php">View Courses</a></li>
            <li><a href="adminpanel.php">AdminPanel</a></li>
        </ul>
      </div>
    </div>
  </nav>
      

    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:#5FCF80;">Add Course</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Enter Course Details</p>
            <div class="form-group">
              <form name="" id="loginForm" method="post" action="addcourse.php">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Course Name" id="loginid" type="text" autocomplete="off" name="name" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                
                </div>
                <div class="form-group has-feedback">
                  <!----- mail -------------->
                  <input class="form-control" placeholder="Course ID"  type="text" autocomplete="off" name="id" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <label for="img">Course Image</label>
                  <input class="form-control" placeholder="Course Image" id="img" type="file" autocomplete="off" name="img" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <label for="var">Course Variant</label>
                  <select class="form-control" selected="Normal" id="var" name="var"  autocomplete="off" name="var" required> 
                  <option value="0">Normal</option>
                      <option value="1">Pro</option>
                  </select>
                  <br>
                  <input class="form-control" placeholder="Video Link" id="link"  autocomplete="off" name="link" required/>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" name="btn" class="btn btn-green btn-block btn-flat" >Add Course</button>
                  </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
</body>