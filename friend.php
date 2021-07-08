<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    if(isset($_GET['id'])){
    $un=$_GET['id'];
    $sql = "SELECT * FROM user where uname='$un'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $sql1 = "SELECT * FROM project where sid='$un'";
    $result1 = mysqli_query($conn, $sql1);
    $sql2="SELECT * FROM con where n2='$un'";
    $result2 = mysqli_query($conn, $sql2);
    
   
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
                        <a class="menu-box-tab" href="https://api.whatsapp.com/send?phone=+91<?php echo $row['pno']?>&amp;text="><span class="icon fontawesome-envelope scnd-font-color"></span> Message</a>                            
                        </li>
                        <li>
                        <?php
                        $sql98 = "SELECT * FROM project where sid='$un' ORDER BY pid DESC ";
                        $result98 = mysqli_query($conn, $sql98);
                           ?> <a class="menu-box-tab" href="friendproj.php?i=<?php echo $un?>"><span class="icon entypo-paper-plane scnd-font-color"></span>View Projects<div class="menu-box-number"><?php  echo mysqli_num_rows($result98)?></div></a>                            
                        </li>
					
                        <li>
                        <?php $n1=$_SESSION['user_name'];
                           $n2=$un;
                            $sql4="SELECT * FROM con where n1='$n1' AND n2='$n2'";
                              $result4 = mysqli_query($conn, $sql4);?>
                            <a class="menu-box-tab" href="<?php  if (mysqli_num_rows($result4)>=1) { 
                                                          ?> unfollow.php?q=0&n1=<?php echo $n1?>&n2=<?php echo $n2;}
                                                          else{
                                                            ?>
                                                            follow.php?n1=<?php echo $n1?>&n2=<?php echo $n2;
                                                          }?>"><span class="icon entypo-plus scnd-font-color"></span><?php  if (mysqli_num_rows($result4)>=1) { 
                                                            ?>Unfollow<?php }else{ 
                                                                ?>Connect<?php
                                                            }?></li></p></a><div class="menu-box-number"></div></a>
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
                   <?php $n1=$_SESSION['user_name'];
                   $n2=$un;
                    $sql4="SELECT * FROM con where n1='$n1' AND n2='$n2'";
                   $result4 = mysqli_query($conn, $sql4);?>
                
                        <li><a class="comments" href="<?php  if (mysqli_num_rows($result4)>=1) { 
                                                          ?> unfollow.php?q=0&n1=<?php echo $n1?>&n2=<?php echo $n2;}
                                                          else{
                                                            ?>
                                                            follow.php?n1=<?php echo $n1?>&n2=<?php echo $n2;
                                                          }?>"><p><?php  if (mysqli_num_rows($result4)>=1) { 
                                                            ?>Unfollow<?php }else{ 
                                                                ?>Connect<?php
                                                            }?></li></p></a>
                        <li><a class="views" href="https://api.whatsapp.com/send?phone=+91<?php echo $row['pno']?>&amp;text="><p>Message</li></p></a>
                        <li><a class="likes" href="#42"><p><img src="fol2.png" height="50px" width="50px"><?php  echo mysqli_num_rows($result2)?> </li></p></a>
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
                        <p class="scnd-font-color" style="color:white; margin-top:5px;">Skills</p>
                    </div>
                    <div class="input-container">
                        <span class="textarea" style="border-top-right-radius:5px; border-bottom-right-radius:5px;border-top-left-radius:5px;border-bottom-left-radius:5px;" type="text" role="textbox" value="<?php echo $row['skills']?>" readonly><?php echo $row['skills']?></span>
                        
                    </div>
                    <div class="point">
                        <p class="scnd-font-color" style="color:white;">Branch</p>
                    </div>
                    <div class="input-container">
                        <span class="textarea" style="border-top-right-radius:5px; border-bottom-right-radius:5px;border-top-left-radius:5px;border-bottom-left-radius:5px;" type="text" role="textbox" value="<?php echo $row['branch']?>" readonly><?php echo $row['branch']?></span>
                        
                    </div>
      
                    
                </div>
                
                
                 <!-- end calendar-month block --> 
            </div> <!-- end right-container -->
        </div> <!-- end main-container -->
    </body>
</head>
</html>
<?php }?>