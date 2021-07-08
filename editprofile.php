<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    $un=$_SESSION['user_name'];
    if(isset($_POST['fname'])){
        $fname=$_POST['name'];
        $sql1 = "UPDATE user
        SET fname = '$fname'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    }
    if(isset($_POST['b'])){
        $t=$_POST['branch'];
        $sql1 = "UPDATE user
        SET branch = '$t'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    
      
    }
    if(isset($_POST['y'])){
        $t=$_POST['year'];
        $sql1 = "UPDATE user
        SET year = '$t'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    
          
    }
    if(isset($_POST['s'])){
        $t=$_POST['skill'];
        $sql1 = "UPDATE user
        SET skills = '$t'
        WHERE uname = '$un'";
         mysqli_query($conn,$sql1);
    }
    if(isset($_POST['bio'])){
        $t=$_POST['b'];
        $sql1 = "UPDATE user
        SET des = '$t'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    }
    if(isset($_POST['p'])){
        $iname = rand(1000,10000)."-".$_FILES["pp"]["name"];

        $tname = $_FILES["pp"]["tmp_name"];
        
        $uploads_dir = 'image/'.$iname;
        
        move_uploaded_file($tname, $uploads_dir);
        $sql1 = "UPDATE user
        SET pp = '$uploads_dir'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    }
    if(isset($_POST['la'])){
        $fb=$_POST['fb'];
        $tw=$_POST['tw'];
        $g=$_POST['g'];
        $sql1 = "UPDATE user
        SET fb = '$fb',tw='$tw',g='$g'
        WHERE uname = '$un'";
        mysqli_query($conn,$sql1);
    }

   
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Profile</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles5.css" type="text/css"/>
    <style>
	body{
	font-family: Palatino Linotype;  
	background-image: url(''); 
	background-color: #394264;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	color:white
	}
        textarea.full-width {
		
         width: 400px;
         height:100px;
        }
        textarea.cap {
		
         width: 400px;
         height:100px;
        }
        div.im{
            position:fixed;
        }
        </style>
  </head>

<body>
         <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADS</a>
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
                            <li><a class="dropdown-item" href="logout.php" onclick="returnconfirm('Do you want to logout?');">Logout</a></li>
                        </ul>
                    </li>
                   
                   
                </ul>
              
                <form class="d-flex " method="post" action="search.php">
                <input class="form-control me-2" name="srch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
        </nav>
    <?php
    $sql = "SELECT * FROM user where uname='$un'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    ?>
  <div class="container">
  <div class="row">
    <div class="col my-5">
        <div class="im">
          <!-- Div to center the header image/name/social buttons -->
        
                <form action="" method="POST" enctype="multipart/form-data">
              <!-- Placeholder image using Placeholder.com -->
              
              <img src="<?php echo $row['pp'];?>" height="150px" width="200px" class="img-rounded"/><br>
              <input type="file" name="pp">
              <br><button class="btn btn-primary" type="submit" name="p">Save pic</button><br>
    </div>
</div>
<div class="col-9">
              <!-- Header text (Person's name) -->
              <h3>Fill Data(MANDATORY)</h3>
            
              <!-- Social buttons using anchor elements and btn-primary class to style -->
             
       
      <div class="col-md-8 col-sm-* col-xs-* my-5">

       
        <p class="lead">Name&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" style="width:320px;" value="<?php echo $row['fname'];?>"></p>
        <button class="btn btn-primary " type ="submit" style="margin-left:170px; name="fname" >change name</button>
        
        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        </div>


        <!-- Body text (paragraph 1) -->
        <p>
        <div class="col-md-8 col-sm-* col-xs-* my-5">
         <p class="lead">Branch &nbsp;&nbsp; <input type="text" name="branch" style="width:315px;" value="<?php echo $row['branch'];?>"></p>
        <button class="btn btn-primary" type="submit" name="b" style="margin-left:200px;">Save</button>
        </p>
        </div>
        <!-- Body text (paragraph 2) -->
    
        <p class="lead">Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="year" style="width:315px;" value="<?php echo $row['year'];?>"></p>
        <button class="btn btn-primary" type="submit" name="y" style="margin-left:200px; role="button">Save</button>
        <br>
        <br>
		<p class="lead">skills</p>
        <textarea  class="full-width" name="skill" ><?php echo $row['skills']; ?></textarea><br><br>
        <button class="btn btn-primary " type="submit" name="s" style="margin-left:200px; role="button">Save</button>
		
		<br><p class="lead">Bio</p>
              <textarea  class="cap" name="b"><?php echo $row['des']; ?></textarea><br><br>
              <button class="btn btn-primary " name="bio" style="margin-left:180px; type="submt">Save Bio</button>
        <!-- Body text (paragraph 3) -->
		<p>
                <br><h3>Provide Your Links(OPTIONAL)</h3><br>
                <br><label>Facebook</label>&nbsp;&nbsp;
                <input type="text" name="fb" style="width:320px;"><br>
                <br><label>Twiter</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="tw" style="width:320px;"><br>
                <br><label>Google</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="g" style="width:320px;"><br>
                <br><button class="btn btn-primary" type="submit" style="margin-left:200px; name="la">Save</button>
              </p>

        <p>
        
        </p>

        <!-- Body text (paragraph 4) -->
        <p>
       </p>


</form>
    </div>
     </div>
     </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>

</html>