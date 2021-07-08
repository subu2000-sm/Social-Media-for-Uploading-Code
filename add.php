<?php
        session_start();

        ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
	body{
	font-family: Palatino Linotype;  
	background-image: url(''); 
	background-color: goldenrod;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	color:white
	}
	.block {
			
			margin-top: 80px;
			margin-left:450px;
			margin-bottom:25px;			
			background: #394264;
			border-radius: 5px;
			width:500px;
	h1{
	text-decoration:underline;
	}
	</style>
	</head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                                <li><a class="dropdown-item" href="friendlist.php">Friend List</a></li>
									
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Do you want to logout?');">Logout</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    <form class="d-flex" method="POST" action="search.php">
                    <input class="form-control me-2" name="srch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
       <div class="block">
	   <h1><center>CREATE PROJECT</h1>
       
        <form method="POST" action="create.php">
        <div class="mb-3 my-4 mx-5">
           
            <label for="Input1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Project Title" name="pname" required>
          </div>
          <div class="mb-3 mx-5">
            <label for="Textarea1" class="form-label">Project Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Project Description" rows="3" name="pdesc"></textarea>
          </div>
		 
          <div class="form-check mx-5">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="private">
            <label class="form-check-label" for="flexRadioDefault1">
            Private
            </label>
          </div>
          <div class="form-check mx-5">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" checked value="public">
            <label class="form-check-label" for="flexRadioDefault2">
              Public
            </label>
          </div>
		       
         <br> <center><button type="submit" class="btn btn-lg btn-outline-success" name="create">Create</button></center><br></div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>