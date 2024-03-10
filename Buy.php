<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buy Now</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="images/chrome logo33.PNG" type="image/ico">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">



<!-- =======================================================
* Template Name: Presento - v3.10.0
* Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <!-- <h1 class="logo me-auto"><a href="#">Presento<span>.</span></a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.html" class="logo me-auto"><img src="assets/img/Logo.png" alt=""></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="index.html">Home</a></li>
        <li><a class="nav-link scrollto" href="aboutus.html">About Us</a></li>
        <li><a class="nav-link scrollto" href="Contact.php">Contact Us</a></li>
        <li class="dropdown"><a href="#"><span>CA Portal Category</span> <i class="bi bi-chevron-down"></i></a>
          <ul>

            <li><a class="nav-link scrollto" href="index.html">Theme for CA, CS, LAWYERS</a></li>
            <li><a class="nav-link scrollto" href="./index.html">whatsapp Support</a></li>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->






<?php
session_start();
if(isset($_POST['submit'])){
include('Admin/dbcon.php');

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $msg=$_POST['msg'];

    $sql=mysqli_query($conn, "INSERT INTO `buy`( `name`, `email`, `mobilenumber`, `message`) VALUES ('$name','$email','$mob','$msg')");

    if($sql){
        echo "<script>alert('Thank You For Contacting');</script>";
        echo "<script>window.location.href = 'Index.html'</script>";
    }else{
        echo "<script>alert('Try Again later');</script>";

    }

    $email = $_POST["email"]; 
    $sql1 = mysqli_query($conn, "SELECT * FROM buy WHERE email='$email'");
    $query = mysqli_num_rows($sql1);
  	    $fetch = mysqli_fetch_assoc($sql1);

        if(mysqli_num_rows($sql1) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
                window.location.replace("contact.php");
            </script>
            <?php
        }
        else{
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
            $mail->addCC("caportal@tarunainfosoft.com", "CA Portal Admin");

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Request Received on CA Portal";
            $mail->Body="<b>Dear ".$name.", </b>
            <h3>Thankyou for showing interest with us.</h3>
            <p>Below are the details you submitted on the portal </p>

            <p> Name: ".$name.", </p>
            
            <p> Mobile Number: ".$mob.", </p>
            
            <p> Email id: ".$email.", </p>
            
            <p> Message: ".$msg.", </p>

            <p>Our team experts will contact you shortly </p>
            <p>With regrads,</p>
            <b>Taruna Infosoft CA Portal </b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo "Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                         window.location.replace("confirm-mail.php");
                    </script>
                <?php
            }
        }    



}

?>


<link rel="stylesheet" href="Buycss.css">
<body>
    <section>
        <br></br>
    <form method ="post">
    <div class="banner">
        <div class="container">
            <div class="contact-box">
                <div class="center">
                    <h2>Enter the details of your product </h2>
                    <input type="text" class="field" name ="name" placeholder="Your Name" required>
                    <input type="email" class="field" name ="email" placeholder="Your Email" required>
                    <input type="text" class="field" name ="mob" placeholder="Your Mobile Number" required>
                    <textarea class="field" name ="msg" placeholder="Your Message" required></textarea>
                    <button class="btnn" name="submit"><span></span>Submit</button>       
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
</body>
</html>    



<!-- To make Id start from 1 use below sql query  -->

<!-- 
    
DELETE FROM buy;
ALTER TABLE buy AUTO_INCREMENT = 1;

DELETE FROM contact;
ALTER TABLE contact AUTO_INCREMENT = 1;

-->




 <!-- ======= Footer ======= -->
 <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <a href="index.html"><img src="assets/img/Footer Image 4.PNG" alt=""></a>
              <p class="pv-txt"> Taruna infosoft facilitates you to choose a theme among the available hundreds of custom themes for your websites. </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="aboutus.html">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="Contact.php">Contact Us</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Themes for CA</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Themes for CS</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Themes for Lawyers</a></li>
          
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Contact Us</h4>
        <ul>
          <li><i class="bi bi-geo-alt-fill"></i><a href="https://www.google.com/maps/search/taruna+infosoft/@19.3919366,72.8309653,14z/data=!3m1!4b1" target="_blank"> 34, Dewan Tower, Vasai Station Rd, near Kubera Hotel, Anand Nagar, Vasai West, Navghar-Manikpur, Maharashtra 401202</a></li>
          <li><i class="bi bi-telephone-fill"></i><a href="tel:919702402987"><span class="glyphicon glyphicon-user" style="margin-right: 10px"></span>
            <span>9702402987</span></a></li>

          <li><i class="bi bi-envelope-check-fill"></i><a href="mailto:info@tarunainfosoft.com"><span class="glyphicon glyphicon-user" style="margin-right: 10px"></span>
            <span>mail@tarunainfosoft.com </span></a></li></a> 

        </ul>
      </div>
      

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      <p>© 2024 - <a href="index.html"><span> Taruna Infosoft </span></a>| All Rights Reserved. </p>
    </div>
    
  </div>
  <div class="social-links text-center text-md-end pt-3 pt-md-0">
    <a href="https://twitter.com/tarunainfosoft" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="https://www.facebook.com/tarunainfosoft21/" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://www.instagram.com/tarunainfosoft/" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://www.youtube.com/channel/UChtiLpYbC_wiAn4-oXytVPg?app=desktop" class="google-plus"><i class="bi bi-youtube"></i></a>
    <a href="https://in.linkedin.com/company/tarunainfosoft" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


</body>

</html>