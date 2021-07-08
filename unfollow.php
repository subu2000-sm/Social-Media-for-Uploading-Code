
<?php
    session_start();
$localhost = "localhost"; 
$dbusername = "root"; 
$dbpassword = "";  
$dbname = "test2"; 

$n1='subu';
$n2='bug';
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 




if(isset($_GET['q'])){
    $n1=$_GET['n1'];
    $n2=$_GET['n2'];
   $sql= "DELETE FROM con WHERE n1='$n1' and n2='$n2'";
   $result = mysqli_query($conn, $sql);
   header("Location: friend.php?id=$n2");
   
}  
?>