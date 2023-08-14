
<?php
$conn = new mysqli("localhost", "root", "", "expdb");
    session_start();
    
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<button style="position:fixed;top:5px;border:none;" onclick="history.back(-1);" > <span style="font-size:30px" class="glyphicon glyphicon-circle-arrow-left"></span>  </button>
<center> <h1 style="margin-bottom:20px;font-size:30px;">Uploaded Notes</h1></center><hr>

<style>
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
echo "";

    
    
 
    
    
    
    
    
    
    
 
    
$fname=$_SESSION["username"];
$result=mysqli_query($conn,"select * from notes where uploader='$fname'");
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
    echo "<tr>   <form action='viewnotes.php' method='post'>";
    echo "<input style='display:none;' name='noteid' value='$noteid' type='text'>";
     echo  "<td>".$i."";
     ?>
     <?php
      echo " </td> <td>$semnum</td> <td>$subname</td><td> $subid</td><td>$module <button style='margin-left:60px !important;color:black;' type='submit' name='delete' > Delete </button> </td>  <td> 
     <button class='dwnldbtn'><a  download='$path' href='$path'><i class='fa fa-download'></i>Download</a> </td></button> " ;  
     echo "</form></tr>";
}
echo "</table>";

?>
<?php
}
else{

echo "<table  class='cont table table-hover table-dark'><tr><td style='text-align:center;'>Yet to Upload Note</td></tr>

</table>";
}
}
}
if(isset($_POST['delete']))
{

$nid=$_POST['noteid'];
$query = "delete from notes where id='$nid'";
$sql_result1 = mysqli_query($conn, $query);
?>
<script>
    window.location.href="viewnotes.php"
</script>
<?php
}
?>