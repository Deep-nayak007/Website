<?php
session_start();
// error_reporting(0);
    if(isset($_POST["submit"])){
        include("dbcon.php");
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($conn, "SELECT * FROM adminlogin WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($email){
            $new_pass = $hash;
            mysqli_query($conn, "UPDATE adminlogin SET password='$new_pass' WHERE email='$email'");
            ?>
            <script>
                alert("<?php echo "your password has been succesful Changed"?>");
                window.location.replace("Login.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>


<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <title>Admin | Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    
     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/img/chrome logo33.PNG">
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<style>
.text-muted{
    font-size: 15px;
    text-decoration:none;
    color: #eee;
}
.my-text-muted a{
    text-decoration:none;
    color: #eee;
}
.bottom-text {
    font-size: 15px;
    color: #444;
    text-align:center;
}

.bottom-text a {
    font-size: 15px;
    color: blue;
    text-decoration: underline;
}
.footer{
    font-size:15px;
    text-align:center;
}
/* Media queries  */
@media (max-width:450px) {
   .form-check-label{
       font-size:15px;
   }
   small{
      font-size:12px;
   }
   #top-text{
       font-size: 15px;
   }
}

</style>

<body style="background: #D1B894;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-6">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto" id="candidate-text">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold" style="font-size: 28px;" class="my-text">Change Password</h4>
                                <p class="text-muted mb-4" id="top-text">Enter your New Password to Update Your Password then access Admin dashboard.
                                </p>
                            </div>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">New Password</label>
                                    <input class="form-control" type="password" id="emailaddress" required="true" name="password"
                                        placeholder="Enter New Password">
                                </div>

                                <div class="mb-2 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name="submit"> Change Password </button>
                                </div>
                            </form>
                           
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="Login.php" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    <!-- end row -->

                </div> <!-- end col -->

            </div>
           
            <!-- end row -->
        </div>
        
        <!-- end container -->
    </div>

    
    
</body>

</html>
