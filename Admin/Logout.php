<?php
session_start();
include('dbcon.php');
$_SESSION['loggedin'] == "";
session_destroy();
// Redirect to the login page:
header('Location: Login.php');
exit();
?>

<!-- To show 404 error code after logout button is pressed  -->
<?php
 //session_destroy();

 //echo 'You have cleaned session';
 //header('Refresh: 2; URL = Buydata.php;');
?>


