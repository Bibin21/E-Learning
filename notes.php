
<?php
$conn = new mysqli("localhost", "root", "", "expdb");
    session_start();
    
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<button style="position:fixed;top:5px;border:none;" onclick="window.location.href='myaccount.php'" > <span style="font-size:30px" class="glyphicon glyphicon-circle-arrow-left"></span>  </button>
<center> <h1 style="margin-bottom:20px;font-size:30px;">Uploaded Notes</h1></center><hr>
<form method="post" action="notes.php" style="position:fixed;top:15px;right:10px;">
  <input type="text" name="searchquery" class="textbox" placeholder="Search">
  <button type="submit" name="search" class="button"><span class="glyphicon glyphicon-search"> </span> </button>
</form>


<style>
    
form {
  outline: 0;
  float: left;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

form > .textbox {
  outline: 0;
  height: 42px;
  width: 244px;
  line-height: 42px;
  padding: 0 16px;
  background-color: rgba(255, 255, 255, 0.8);
  color: #212121;
  border: 0;
  float: left;
  -webkit-border-radius: 4px 0 0 4px;
  border-radius: 4px 0 0 4px;
}

form > .textbox:focus {
  outline: 0;
  background-color: #FFF;
}

form > .button {
  outline: 0;
  background: none;
  background-color: rgba(38, 50, 56, 0.8);
  float: left;
  height: 42px;
  width: 42px;
  text-align: center;
  line-height: 42px;
  border: 0;
  color: #FFF;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: 16px;
  text-rendering: auto;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-transition: background-color .4s ease;
  transition: background-color .4s ease;
  -webkit-border-radius: 0 4px 4px 0;
  border-radius: 0 4px 4px 0;
}

form > .button:hover {
  background-color: rgba(0, 150, 136, 0.8);
}
body {
  font-family: Arial, Helvetica, sans-serif;
}
.row
    {
        border: 2px solid black;
    }
.ntf
    {
        color:red;
        position: absolute;
        top:0px;
        
    }
.msg
    {
        color:blue;
    }
.cont
    {
        width:100%;
    }
.cont-head
    {
        width:100%;
         font-weight: bolder;
        
    }
td
    {
        width:15%;
        font-size: 18px;
        text-transform: capitalize;
        padding-top: 8px;
        
    }

.dwnldbtn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 30px;
    cursor: pointer;
    font-size: 20px;
    border-radius: 15px;
}

/* Darker background on mouse-over */
.dwnldbtn:hover {
    background-color: RoyalBlue;
}
    a,a:hover
    {
        color:white;
        text-decoration: none;
    }
</style>


<?php

$i=0;
$localhost = "localhost";
$usernamew = "root";
$passwordw = "";
$db = "expdb";
$conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
if(!$conn){
echo "Connection error";
}
else{
echo "";
 
$fname=$_SESSION["username"];
if(isset($_POST["search"]))
{
$searchtext=$_POST["searchquery"];
$result=mysqli_query($conn,"select * from notes where subject like '%$searchtext%' or subjectid like '%$searchtext%' order by sem ,module  ");

}
else
{
$result=mysqli_query($conn,"select * from notes order by sem ,module");
}

	        $i=0;
echo "<table class='cont-head'>";
echo "<tr >";
echo "<td>Id</td><td>Sem</td><td>Subject</td><td>Subject ID</td><td>Module</td></td><td>Note</td>"; 
echo "</td>";
echo "</tr>";
echo "</table><hr>";
echo "<table class='cont table table-hover table-dark'>";
if (mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_assoc($result)){
   $noteid= $row['id'];
   $subname=$row["subject"];
   $subid=$row["subjectid"];
   $semnum=$row["sem"];
   $module=$row["module"];
   $path=$row["path"];
?>
<script>
   var link="<?php echo $result1; ?>";
   
   //print
</script>
<?php
    $i++;
    ?>

    <?php
    echo "<tr>   <form action='viewnotes.php' method='POST'>";
    echo "<input style='display:none;' name='noteid' value='$noteid' type='text'>";
     echo  "<td>".$i."";
     ?>
     <?php
      echo " </td> <td>$semnum</td> <td>$subname</td><td> $subid</td><td>$module </td>  <td> 
     <button class='dwnldbtn'><a  download='$path' href='$path'><i class='fa fa-download'></i>Download</a> </td></button> " ;  
     echo "</form></tr>";
}
echo "</table>";

?>
<?php
}
else{

echo "<table  class='cont table table-hover table-dark'><tr><td style='text-align:center;'>No Notes Found</td></tr>

</table>";
}
}



?>