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
    
        $name = validate($_POST['uname']);
        $pass = validate($_POST['pwd']);
        
        
        
        
        if(!empty($_POST["remember"])) {
            setcookie ("username",$_POST["uname"],time()+ 3600);
            setcookie ("password",$_POST["pwd"],time()+ 3600);
        } else {
            setcookie("username","");
            setcookie("password","");
            echo "Cookies Not Set";
        }
        
    
        
        if (empty($name)) {
            header("Location: index.php?error=User Name is required");
            exit();
        }else if(empty($pass)){
            header("Location: index.php?error=Password is required");
            exit();
        }else{
    
            $pass = md5($pass);
    
            
            $sql = "SELECT * FROM user WHERE uname='$name' AND pwd='$pass'";
    
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['uname'] === $name && $row['pwd'] === $pass) {
                    $_SESSION['user_name'] = $row['uname'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['sid'] = $row['id'];
                    header("Location: post.php");
                    exit();
                }else{
                    header("Location: index.php?error=Incorect User name or password");
                    exit();
                }
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }
        
    }else{
        header("Location: index.php");
        exit();
    }