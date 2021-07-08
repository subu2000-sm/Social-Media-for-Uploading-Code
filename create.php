<?php 
session_start();
$localhost = "localhost"; 
$dbusername = "root"; 
$dbpassword = "";  
$dbname = "test2"; 

$sid=$_SESSION['user_name'];
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
if(isset($_POST['create'])){
 function validate($data)
    {
        $data=trim($data);
        return $data;
    }
    $pname=validate($_POST['pname']);
    $pdesc=validate($_POST['pdesc']);
    $status=validate($_POST['status']);
    $pimg='image/empproj.jfif';
    $sql = "INSERT INTO project(sid, pname, pdesc, pimg, status,date) VALUES('$sid', '$pname', '$pdesc', '$pimg', '$status',CURRENT_TIME())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
         
        $sql = "SELECT * FROM project WHERE pname='$pname'";
    
        $result2 = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result2) === 1) {
            $row = mysqli_fetch_assoc($result2);
            if ($row['pname'] === $pname ) {
                $_SESSION['pname'] = $row['pname'];
                $_SESSION['pimg'] = $row['pimg'];
                $_SESSION['pdesc']=$row['pdesc'];
                $_SESSION['id'] = $row['pid'];
                $_SESSION['sid'] = $sid;
                header("Location: add_file.php");
                exit();
            }
        }
    else {
            header("Location: add.php?error=unknown error occurred&$user_data");
         exit();
    }


 }
}
else{
    header("Location:add.php");
}
