<?php      
      session_start();
      include('dbcon.php');
      if(!isset($_SESSION['loggedin'])){
        header('Location:Login.php');
        exit();
      }
      
        //to prevent from mysqli injection  
        //$user = stripcslashes($user);  
        //$password = stripcslashes($password);  
        //$user = mysqli_real_escape_string($conn, $user);  
        //$password = mysqli_real_escape_string($conn, $password);  
      
        //$sql = "select * from login where username = '$user' and password = '$password'";  
        //$result = mysqli_query($conn, $sql);  
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        //$count = mysqli_num_rows($result);  
          
        //if($count == 1){  
         //   echo "<h1><center> </center></h1>";  
        //}  
        //else{  
          //  echo "<h1> Login failed. Invalid username or password.</h1>";  
            //header("Location: Login.php");
        //}     
?> 





<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <link rel="icon" href="../images/chrome logo33.png" type="image/ico">
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Super Admin Page </title>
        <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            

             <!-- Nav1 ends here-->

            <!-- Nav2 starts here-->
            <nav class="nav2 ">
           
            <div class="nav2-left">
                <img src="../images/Logo.png"/>
            </div>
          
            </nav>

            <!-- Nav2 Ends here-->

            <!-- Nav3 starts here-->
            <nav class="nav3">
                <ul>
                  
                    <li><a href="#"><i class="fa fa-puzzle-piece"></i><i class="fa fa-caret-down"></i>Select Options</a>
                    <ul>
                        <li><a href="./Buydata.php"><i class="fa fa-clipboard"></i>Purchase details </a> </li>

                        <li><a href="./Contactdetail.php"><i class="fa fa-clipboard"></i>Contact details</a> </li>
                    </ul>
                    </li>
                    <li><a href="Logout.php"><i class="fa fa-lock"></i>Log Out</a></li>
                </ul>
            </nav>

            <section class="featured">
                <div class="featured-text">
                    <!--<button>Coming Soon</button> -->
                    <h2>Super Admin's Page</h2>
                </div>
            </section>
        </header>
    </body>
</html>            
    