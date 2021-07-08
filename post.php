<?php

    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    $sql = "SELECT * FROM project ORDER BY pid DESC"; 
    $result = mysqli_query($conn, $sql);
	  $k= $_SESSION['user_name'];
    $sql3 = "SELECT * FROM user where uname='$k'";
    $result3 = mysqli_query($conn, $sql3);
    $row3=mysqli_fetch_assoc($result3);
   
?>
<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
                        <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                             <image src="<?php echo $row3['pp'];?>" height="30px" width="30px">
                            <?php echo  $_SESSION['user_name'];?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="create.php">Create Project</a></li>
                            <li><a class="dropdown-item" href="myproj.php">View Project</a></li>
							 <li><a class="dropdown-item" href="friendlist.php">Friend List</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php" onclick="confirm('Do you want to logout?');">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <form class="d-flex"  action="search.php" method="POST">
                    <input class="form-control me-2" name="srch" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel" >
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="3.jfif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Welcome To ADS Media</h5>
              <p><a href="create.php" class="btn btn-success">Create Project</a>
              <a href="myproj.php" class="btn btn-danger">View Project</a></p> 
            </div>
          </div>
          <div class="carousel-item">
            <img src="5.jfif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Best Place To share your Ideas</h5>
              
              <p><a href="create.php" class="btn btn-success">Create Project</a>
              <a href="myproj.php" class="btn btn-danger">View Project</a></p>  
            </div>
          </div>
          <div class="carousel-item">
            <img src="4.jfif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Easily upload your project</h5>
              <p><a href="create.php" class="btn btn-success">Create Project</a>
              <a href="myproj.php" class="btn btn-danger">View Project</a></p> 
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
	   </div>
      <div class="mx-5 my-4">
      <h1 class="mb-0">Feeds</h1><br>
    <?php   
                while($rows=mysqli_fetch_array($result))
                {
                    $un=$rows['pname'];
                    $n=$rows['pdesc'];
                    $i=$rows['sid'];
                    $img=$rows['pimg'];
                    $id=$rows['pid'];
             ?>
        <div class="row mb-2">
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary"><?php 
                        echo $i;
                        ?></strong>
                  <h3 class="mb-0"><?php 
                        echo $un;
                        ?></h3>
                  <div class="mb-1 text-muted">Posted On:<?php echo $rows['date']?></div>
                  <p class="card-text mb-auto"><?php 
                        echo $n;
                        ?></h3></p>
                  <a href="edit.php?id=<?php echo $id;?>" class="btn btn-warning">Check it out</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img  class="bd-placeholder-img" width="200" height="250" src="<?php echo $rows['pimg'];?>" alt="">
                </div>
              </div>
            </div>
        </div>
        
        <?php
                }
         ?>
        
        
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
    
    
    
    </body>
    </html>
    