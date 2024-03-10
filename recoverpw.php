<?php 
session_start();
    if(isset($_POST["reset"])){
        include("Admin/dbcon.php");
        $email = $_POST["email"];

        $sql = mysqli_query($conn, "SELECT * FROM adminlogin WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);
        $buttonclick ="<a href=https://localhost/CA%20Website/Website/Admin/change-password.php?email=".$email."&token=".$token."><button> Reset Password </button></a>";
        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
                window.location.replace("recoverpw.php");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("Admin/Login.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Admin/mail/PHPMailer-master/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='mail.tarunainfosoft.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='sms@tarunainfosoft.com';
            $mail->Password='Taruna@007';

            // send by h-hotel email
            $mail->setFrom('sms@tarunainfosoft.com', 'Taruna Infosoft CA Portal');
            // get email from input
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your Admin password";
            $mail->Body="<b>Dear Admin</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the  below link to reset your password</p>
            ".$buttonclick."
            <br><br>
            <p>With regrads,</p>
            <b>Taruna Infosoft CA Portal</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo "Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                         window.location.replace("Admin/Login.php");
                    </script>
                <?php
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin | Recover Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/img/chrome logo33.PNG">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
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

<body style="background: #282D3C;">
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                           
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold" style="font-size: 28px;">Reset Password</h4>
                                    <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                </div>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" required="true" placeholder="Enter your email">
                                    </div>

                                    <div class="mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="reset">Reset Password</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="Admin/Login.php" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
        <p class="text-muted">© 2023 - <a href="index.html"><span> Taruna Infosoft </span></a>| All Rights Reserved. </p>
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
