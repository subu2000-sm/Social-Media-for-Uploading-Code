<?php
    session_start();
    $localhost = "localhost"; 
    $dbusername = "root"; 
    $dbpassword = "";  
    $dbname = "test2"; 
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname); 
    $n1='subu';
    $n2='bug';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

         $sql="SELECT * FROM con where n1='$n1' AND n2='$n2'";
         $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['n1'] === $n1 && $row['n2'] === $n2) {
            ?>
        
                  <form action="follow.php" method="post">
                  <button type="submit" name="Dis">Unfollow</button>
              </form>
           <?php }
         }

    else{?>

    <form action="follow.php" method="post">
    <button type="submit" name="con">Connect</button>
    </form>
    <?php }?>
</form>
</body>
</html>