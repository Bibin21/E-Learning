<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connect+</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
<?php
$localhost = "localhost";
$usernamew = "root";
$passwordw = "";
$db = "expdb";
session_start();

$conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
if(isset($_POST['create']))
{
    $fname=$_SESSION["username"];
    $meetid=$_POST["meetid"];
$sql = "select * from meet where meetingid=$meetid";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count>0)
{
    echo "<script>alert('Meet With Id already Exist'); </script>";
}
else
{
    $sql = "insert into meet(host,meetingid) values('$fname','$meetid')";
$result = mysqli_query($conn,$sql);
echo "<script>location.href='meet.php'</script>";
}
}
if(isset($_POST['join']))
{
    $meetid1=$_POST["meetid"];
    $sql = "select * from meet where meetingid=$meetid1";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count>0)
{echo "<script>location.href='meet.php'</script>";
   
}
else
{
  echo "<script>alert('Incorrect Meet Id'); </script>";
}
}


?>
<div class="meet"> </div>
    <div class="hero">
      <div class="form-box">
        <div class="button-box" style="display:flex;">
          <div id="btn"></div>
          <button type="button" class="toggle-btn" style="color:black;" onclick="JoinMeeting()">
            Join Meeting
          </button>
          <button type="button" class="toggle-btn" style="color:black;" onclick="HostMeeting()">
            Host Meeting
          </button>
        </div>
        <div class="logo" style="font-weight: bold">
          Meet-<span>Online</span>
        </div>
        <form id="JoinMeeting" action="meetjoin.php" method="post" class="input-group">
          <input
            type="text"
            class="input-field"
            name="meetid"
            placeholder="Enter Meeting ID"
            required
          />
          <br />
          <br />
          <button type="submit"  name="join" class="submit-btn">Join Now</button>
        </form>
        <form id="HostMeeting" method="post" action="meetjoin.php" class="input-group">
          <input
            type="text"
            class="input-field"
            placeholder="Enter Meeting Name(Optional)"
          />
          <input
            type="text"
            class="input-field"
            placeholder="Enter Meeting ID"
            required
            maxlength="10"
            name="meetid"
          />

          <button type="submit" name="create" class="submit-btn">Create & Join Now</button>
        </form>
      </div>
    </div>
    <script>
      var x = document.getElementById("JoinMeeting");
      var y = document.getElementById("HostMeeting");
      var z = document.getElementById("btn");

      function HostMeeting() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }

      function JoinMeeting() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
      }
    </script>




 
    
</body>


<style>


.hero{
    height: 100%;
    width: 100%;
    background: center;
    background-size: cover;
    position: absolute;
}
.form-box{
    width: 480px;
    height: 450px;
    position: relative;
    margin: 6% auto;
    background: white;
    padding: 5px;
    overflow: hidden;
}

.button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #fff;
    border-radius: 30px;
}
.toggle-btn{
    padding: 5px 15px;
    cursor: pointer;
    background:transparent;
    border: 0;
    outline: none;
    position: relative;
}

#btn{
    top: 0;
    left: 0;
    position: absolute;
    width: 110px;
    height: 100%;
    background: #5FCF80;

    border-radius: 30px;
    transition: 0.5s;
}

.social-icons{
    margin: 30px;
    text-align: center;
}

.social-icons img{
    width: 30px;
    margin: 0 12px;
    box-shadow: 0 0 20px 0 #7f7f7f3d;
    cursor: pointer;
    border-radius: 50%;
}
.logo {
    color:  orangered;
    font-size: 40px;
    padding-left: 100px;
    letter-spacing: 5px;
    font-style: oblique;
    background-color: lightskyblue;
  }
.logo span {
    color: black;
}
.log{
    color:  black;
    font-size: 30px;
    padding-left: 100px;
    letter-spacing: 5px;
    font-weight: bold;
    background-color:white;

}

.log span{
    color: orangered;
}
.input-group{
    top: 200px;
    position: absolute;
    width: 280px;
    transition: 0.5s;

}

.input-field{
    width: 100%;
    padding: 7.5px 0;
    margin: 20px 0;
    margin-left: 20%;
    border-left: 10;
    border-top: 10;
    border-right: 10;
    border-bottom: 1px solid #999;
    outline: none;
    background: transparent;
    align-items: center;
    background-position: center;
}

.submit-btn{
    width: 60%;
    padding: 7.5px 7.55px;
    margin-left: 600%;
    margin-right: 70%;
    cursor: pointer;
    display: block;
    margin: auto;
    background: #5FCF80;
    border: 0;
    outline: none;
    border-radius: 30px;

}
#JoinMeeting{
    left: 60px;
    
}
#HostMeeting{
    left: 450px;
    
}


</style>