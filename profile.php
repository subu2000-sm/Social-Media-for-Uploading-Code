<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    $un=$_SESSION['user_name'];
    $sql = "SELECT * FROM user where uname='$un'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $sql2="SELECT * FROM con where n2='$un'";
    $result2 = mysqli_query($conn, $sql2);
    $row2=mysqli_fetch_array($result2);
    
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" >
    <link rel="stylesheet" href="styles5.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        textarea.full-width {
         width: 150px;
         height:150px
        }
        textarea.cap {
         width: 400px;
         height:150px;
        }
		.input,
.textarea {
  border: 1px solid #ccc;
  font-family: inherit;
  font-size: inherit;
  display: block;
  width: 100%;
  overflow: hidden;
  resize: both;
  min-height: 40px;
  line-height: 20px;
  text-align:center;
  
}
hr.new1 {
  border-top: 1px solid black;
  margin-top:0.0em;
  
}
</style>
    
</head>
    
  
<link rel="stylesheet" href="stylepage.css" type="text/css"/>
  <body>
	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="post.php">ADS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="post.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo  $_SESSION['user_name'];?>
                          
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add.php">Add Project</a></li>
                            <li><a class="dropdown-item" href="myproj.php">View Project</a></li>
                            <li><a class="dropdown-item" href="friendlist.php">Friend List</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Do you want to logout?');">Logout</a></li>
                        </ul>
                    </li>
                   
                   
                </ul>
              
                <form class="d-flex " method="POST" action="search.php">
                <input class="form-control me-2" name="srch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
        </nav>
        <div class="main-container">

            <!-- HEADER -->
            

            <!-- LEFT-CONTAINER -->
            <div class="left-container container">
                <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
                    <h2 class="titular">MENU BOX</h2>
                    <ul class="menu-box-menu">
                        <li>
                            <?php $sql43="SELECT * FROM con where n1='$un'";
                              $result43 = mysqli_query($conn, $sql43);?>
                            <a class="menu-box-tab" href="friendlist.php"><span class="icon entypo-user scnd-font-color"></span>Friends<div class="menu-box-number"><?php echo mysqli_num_rows($result43)?></div></a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="myproj.php"><span class="icon entypo-paper-plane scnd-font-color"></span>View Projects<div class="menu-box-number">3</div></a>                            
                        </li>
                        <li>
                            <a class="menu-box-tab" href="editprofile.php"><span class="icon entypo-user scnd-font-color"></span>Edit Profile<div class="menu-box-number"></div></a>                            
                        </li>
			 </ul>
                </div>
                
               
                
               
            </div>

            <!-- MIDDLE-CONTAINER -->
            <div class="middle-container container">
                <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
                    <a class="add-button" href="#28"><span class="icon entypo-plus scnd-font-color"></span></a>
                    <div class="profile-picture big-profile-picture clear">
                        <img width="150px" height="150px" alt="Anne Hathaway picture" src="<?php echo $row['pp']?>" >
                    </div>
                    <h1 class="user-name"><?php echo $row['fname']?></h1>
                    <div class="profile-description">
                        <p class="scnd-font-color"><?php echo $row['des']?></p>
                    </div>
                    <ul class="profile-options horizontal-list">
					
                        <li><a class="comments" href="#40"><img src="fol2.png" height="50px" width="50px"><?php  echo mysqli_num_rows($result2)?></span></li></p></a>
                        <li><a class="views" href="post.php"><p>ADS</span></li></p></a>
                        <li><a class="likes" href="editprofile.php"><p><span class="icon entypo-user scnd-font-color"></span></li></p></a>
                    </ul>
                </div>
                
               
                <ul class="social horizontal-list block"> <!-- SOCIAL (MIDDLE-CONTAINER) -->

                    <li class="facebook"><a href="#50"><p class="icon"><span class="zocial-facebook"></span></p></li></a>
                    <li class="twitter"><a href="#51"><p class="icon"><span class="zocial-twitter"></span></p></li></a>
                    <li class="googleplus"><a href="#52"><p class="icon"><span class="zocial-googleplus"></span></p></li></a>
					
                </ul>
            </div>

            <!-- RIGHT-CONTAINER -->
            <div class="right-container container">
                <div class="join-newsletter block"> <!-- JOIN NEWSLETTER (RIGHT-CONTAINER) -->
                    <h2 class="titular">ABOUT ME</h2><hr class="new1">
					
                        <p class="scnd-font-color" style="color:white;">Year</p>
                    
                    <div class="input-container">
                        <span class="textarea" style="border-top-right-radius:5px; border-bottom-right-radius:5px;border-top-left-radius:5px;border-bottom-left-radius:5px;" type="text" role="textbox" value="<?php echo $row['year']?>" readonly><?php echo $row['year']?></span>
                       
                    </div>
					<div class="point">
                        <p class="scnd-font-color" style="color:white; margin-top:15px">Skills</p>
                    </div>
                    <div class="input-container">
                        <span class="textarea" style="border-top-right-radius:5px; border-bottom-right-radius:5px;border-top-left-radius:5px;border-bottom-left-radius:5px;" type="text" role="textbox" value="<?php echo $row['skills']?>" readonly><?php echo $row['skills']?></span>
                        
                    </div>
                    <div class="point">
                        <p class="scnd-font-color" style="color:white; margin-top:15px">Branch</p>
                    </div>
                    <div class="input-container">
                        <span class="textarea" style="border-top-right-radius:5px; border-bottom-right-radius:5px;border-top-left-radius:5px;border-bottom-left-radius:5px;" type="text" role="textbox" value="<?php echo $row['branch']?>" readonly><?php echo $row['branch']?></span>
                        
                    </div>
      
                    
                </div>
                
                
                 <!-- end calendar-month block --> 
            </div> <!-- end right-container -->
        </div> <!-- end main-container -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</head>
</html>
