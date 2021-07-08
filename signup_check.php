<?php 
session_start();
$localhost = "localhost"; 
$dbusername = "root"; 
$dbpassword = "";  
$dbname = "test2"; 
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 

if (isset($_POST['sub'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fname = validate($_POST['fname']);
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
	$pass = validate($_POST['pwd']);

	$re_pass = validate($_POST['rpwd']);
	$pno = validate($_POST['pno']);
	$gender=validate($_POST['gender']);
	$pp="image/nopic.png";

	$user_data = 'fname='. $fname. '&uname='. $uname;


	if (empty($fname)) {
		header("Location: signup.php?error=First Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(strlen($pass)<8){
        header("Location: signup.php?error=Minimum 8 letters required&$user_data");
	    exit();
	}
    else if(empty($uname)){
        header("Location: signup.php?error=Last Name is required&$user_data");
	    exit();
	}
    else if(empty($pno)){
        header("Location: signup.php?error=Phone no is required&$user_data");
	    exit();
	}
	else if(strlen($pno)!=10){
		header("Location: signup.php?error=Invalid no&$user_data");
	    exit();
	}
    else if(empty($gender)){
        header("Location: signup.php?error=gender is required&$user_data");
	    exit();
	}
    
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=email is required&$user_data");
	    exit();
	}
	else if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)) {
		header("Location: signup.php?error=invalid email&$user_data");
	    exit();
	  }

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

	
        $pass = md5($pass);

	    $sql = "SELECT * FROM user WHERE email='$email'  ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email is taken try another&$user_data");
	        exit();
		}
		$sql = "SELECT * FROM user WHERE uname='$uname'  ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}
		else {
           $sql2 = "INSERT INTO user(fname, uname, email, pwd, gender, pno, pp) VALUES('$fname', '$uname', '$email', '$pass', '$gender', '$pno','$pp')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: index.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}