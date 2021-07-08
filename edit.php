<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Projects</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
        textarea.full-width {
         width: 800px;
         height:150px
        }
        </style>
    
	</head>
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
                            <a class="nav-link active" aria-current="page" href="post.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo  $_SESSION['user_name'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add.php">Add Project</a></li>
                                <li><a class="dropdown-item" href="myproj.php">View Project</a></li>
    
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Do you want to logout?');">Logout</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    <form class="d-flex" method="POST" action="search.php">
                    <input class="form-control me-2" name="srch" type="srch" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <?php
        
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }

    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2";  

    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
    $sql="SELECT * FROM snapshot where pid='$id'";
    $res=mysqli_query($conn,$sql);
    $sql2="SELECT * FROM project where pid='$id'";
    $res2=mysqli_query($conn,$sql2);
    $rows2=mysqli_fetch_array($res2);
    $name=$rows2['pname'];
    $usn=$rows2['sid'];
    $d=$rows2['pdesc'];
    $i=$rows2['pimg'];
    $s=$rows2['status'];
    $sql3="SELECT * FROM code where pid='$id'";
    $res3=mysqli_query($conn,$sql3);
    $rows3=mysqli_fetch_array($res3);
    $f=$rows3['file'];
    $sql10="SELECT * FROM user where uname='$usn'";
    $res10=mysqli_query($conn,$sql10);
    $rows10=mysqli_fetch_array($res10);
    $dp=$rows10['pp'];
    ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $i; ?>"height="400px" class="d-block w-100 " alt="ads1.png">
    </div>
  </div>
</div>
<form>
   <center> <h1><?php echo $name; ?></h1>
   <textarea readonly class="full-width"><?php echo $d; ?></textarea><br><br>
   <h3>Author:<img src="<?php echo $dp; ?>" height="40px" width="40px"> <a href="friend.php?id=<?php echo $usn?>"><?php echo $usn?></a></h3><br><br>
    <h2>Snapshots</h2><br><br></center>
    <div class="mx-5">
    <?php
    $i=0;
    while($rows=mysqli_fetch_array($res))
    {
        $i=$i+1;
        ?>
        <h1><?php echo $i.") ".$rows['cap'];?></h1>
        <p><img src="<?php echo $rows['pimg'];?>"width="800" height="600"></img></p>
        <?php
    }
    $rows2=mysqli_fetch_array($res2)
 ?>
      <div class="d-grid gap-2 col-6 mx-auto">
      <?php 
      if($f==null){
        ?><br> <div class="alert alert-danger" role="alert">
        Code not available
    </div>
    <a class="btn btn-primary disabled " type="button" aria-disabled="true">Download</a><br>
    <?php  }
      
      else if($s=='public'){?>
     <br>  <br> <div class="alert alert-success" role="alert">
        Click below to download Code

    </div>
  <a  href="<?php echo $f;?>" class="btn btn-primary" type="button">Download</a><br>
  <?php }
  else{?>
    <br> <div class="alert alert-danger" role="alert">
        Creator Does'nt allow to access the code
    </div>
    <a class="btn btn-primary disabled " type="button" aria-disabled="true">Download</a><br>
    <?php 
  }?>
</div>
</form>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>