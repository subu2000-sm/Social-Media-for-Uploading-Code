<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2";  

    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
    if(isset($_GET['id'])){
   $id=$_GET['id'];
if(isset($_POST['sub'])){
  
    $iname = rand(1000,10000)."-".$_FILES["img"]["name"];

$tname = $_FILES["img"]["tmp_name"];
$cap=$_POST['cap'];

$uploads_dir = 'image/'.$iname;

move_uploaded_file($tname, $uploads_dir);

$sql = "INSERT into snapshot(pimg,pid,cap) VALUES('$uploads_dir','$id','$cap')";


if(mysqli_query($conn,$sql)){

echo "File Sucessfully uploaded";
}
else{
    echo "Error";
}
}

if(isset($_POST['del'])){
    $del=$_POST['pid'];
    $sql= "DELETE FROM snapshot WHERE pid='$id' and pimg='$del'";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
  
body{  
	font-family: Palatino Linotype; 
   
	background-image: url('upload4.jpeg'); 		
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	color:white
	} 
.btn2 {  
  background-color:goldenrod;  
  color: black;  
  padding: 10px 15px;  
  margin: 8px 0;  
  border: none; 
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;  
  cursor: pointer; 
  border-radius:12px;  
  width: 10%;  
  opacity: 0.9;	
}
.post{
  background: url("board1.png");
  background-repeat: no-repeat;
  padding: 0px;
  margin: 0px;
  width: 850px;
  height: 450px;
  font-size:20px; 
  position: fixed;
}
.post2{
  background: url("board1.png");
  background-repeat: no-repeat;
  padding:0px;
  margin-left:1000px;
  width: 400px;
  height: 450px;
  margin-top: 30px;
  font-size:20px; 
}
.btn1{
 background-color:silver;  
  color: white;  
  padding: 05px 15px;  
  margin: 8px 0;  
  border: none; 
  font-size: 12px; 
  cursor: pointer; 
  width: 30%;  
  opacity: 0.9;
  
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
<?php
 if(isset($_POST['submit'])){
    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

$tname = $_FILES["file"]["tmp_name"];

$uploads_dir = 'file/'.$pname;

move_uploaded_file($tname, $uploads_dir);

$sql = "UPDATE code SET file='$uploads_dir' where pid='$id'";

if(mysqli_query($conn,$sql)){

    echo "File uploaded Successfully";
}
else{
    echo "Something went wrong";
}
}
if(isset($_POST['update'])){
    $iname = rand(1000,10000)."-".$_FILES["dimg"]["name"];

    $tname = $_FILES["dimg"]["tmp_name"];
    
    $uploads_dir = 'image/'.$iname;
    
    move_uploaded_file($tname, $uploads_dir);
    
    $sql = "UPDATE project
    SET pimg = '$uploads_dir'
    WHERE pid = '$id'";
    
    
    if(mysqli_query($conn,$sql)){
    
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}

?>

<div class="container-fluid my-3 ">
       
        <!--First row (only row)-->
        <div class="row extra_margin">
    
          <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
          <div class="col-md-4 col-sm-12 col-xs-12">
    
       <div class="post">
       <?php
            $sql8="SELECT * FROM project where pid='$id'";
            $res8=mysqli_query($conn,$sql8);
            $rows8=mysqli_fetch_array($res8);
            ?>
       &emsp;&emsp;&emsp;&emsp;&emsp;<label  >Upload Project icon</label>
        <hr>
       &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Project Cover Image</label>&nbsp;&nbsp;
        <input class ='btn1' type="File" name="dimg">&nbsp;&nbsp;
        &emsp;&emsp;<img src="<?php echo $rows8['pimg'];?>" width="100px" height="100px"></img>

        &emsp;<button class ='btn2' type="submit" name="update">update</button>
        </form>
      
       
        <form method="POST"  enctype="multipart/form-data">
        &emsp;&emsp;&emsp;&emsp;&emsp;<label  >For Every Snapshot Mention Caption</label>
        <hr>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label>Snapshot</label>
        &emsp;&emsp;&emsp;&emsp;&emsp;<input class ='btn1' type="File" name="img"><br>
        &emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&ensp;&ensp;<label>Caption</label>&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;
        <input class ='btn1' type="text" name="cap" required><br>
        &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class ='btn2' type="submit" name="sub">Submit</button><br><br>
        </form>
        &emsp;&emsp;&emsp;&emsp;&emsp;<label  >Upload the zip file of your project</label>
        <hr>
        <form method="POST"  enctype="multipart/form-data">
        <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label style="color=blue">Upload Code</label>&emsp;&emsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;<input class ='btn1' type="File" name="file">&emsp;&emsp;
        <button class ='btn2' type="submit" name="submit">Submit</button><br>
        </form>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="myproj.php" class ='btn2' type="submit" name="submit">Save</a>
        </div>
        </div>
        </div>
        
        <div class="post2">
       <label> Snapshot Previews</label>
        <?php
            $sql="SELECT * FROM snapshot where pid='$id'";
            $res=mysqli_query($conn,$sql);
            while($rows=mysqli_fetch_array($res))
            {
                ?>
                <p><br><br><img src="<?php echo $rows['pimg'];?>"width="400" height="400"></img></p><br>
                <form method="post">
                <input type="hidden" name="pid" value="<?php echo $rows['pimg'];?>">
                <button class ='btn btn-danger' type="submit" name="del">Delete</button><br>
                </form>
                <?php
               
            }
        }
         ?>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  
</body>
</html>
