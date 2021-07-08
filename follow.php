<?php
    session_start();
$localhost = "localhost"; 
$dbusername = "root"; 
$dbpassword = "";  
$dbname = "test2"; 

$n1='subu';
$n2='bug';
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
if(isset($_GET['n1']) && isset($_GET['n2'])){
    $n1=$_GET['n1'];
    $n2=$_GET['n2'];
    $sql="INSERT into con(n1,n2) VALUES('$n1', '$n2')";
    $result = mysqli_query($conn, $sql);
    header("Location: friend.php?id=$n2");
    

}
