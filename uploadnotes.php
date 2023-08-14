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
  session_start();
  $uname=$_SESSION["username"];
$conn = new mysqli("localhost", "root", "", "expdb");
if(isset($_POST["btn"]))
{
    $file=$_FILES['pdf'];
    $actual_name = $_FILES['pdf']['name'];
    $temp_path = $_FILES['pdf']['tmp_name'];
    $move_path = "docs//$actual_name";
    $subname=$_POST["subname"];
    $subid=$_POST["subid"];
    $semnum=$_POST["semnum"];
    $module=$_POST["module"];
    $query = "insert into notes(path,sem,subject,subjectid,module,uploader) values('$move_path','$semnum','$subname',' $subid','$module','$uname')";
    $sql_result1 = mysqli_query($conn, $query);
    move_uploaded_file($temp_path,$move_path);
    header('location:uploadnotes.php');
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
            <li><a href="viewnotes.php">View Uploaded Notes</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>
    </div>
  </nav>
      

    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:#5FCF80;">Upload Notes</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Enter Note Details</p>
            <div class="form-group">
              <form name="" id="loginForm" enctype="multipart/form-data"  method="post" action="uploadnotes.php">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Subject" id="loginid" type="text" autocomplete="off" name="subname" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                
                </div>
                <div class="form-group has-feedback">
                  <!----- mail -------------->
                  <input class="form-control" placeholder="subject ID"  type="text" autocomplete="off" name="subid" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                
                </div>
                <div class="form-group has-feedback">
                  <!----- mail -------------->
                  <input class="form-control" placeholder="Sem"  type="number" autocomplete="off" name="semnum" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <label for="img">Note File</label>
                  <input class="form-control" id="img" accept=".pdf" type="file" autocomplete="off" name="pdf" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                
                  <br>
                  <input class="form-control" placeholder="Module" id="link"  autocomplete="off" name="module" required/>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" name="btn" class="btn btn-green btn-block btn-flat" >Upload</button>
                  </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
</body>