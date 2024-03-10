<?php
session_start();
include('LoginConnection.php');
$_SESSION['loggedin'] == "";
session_destroy();
// Redirect to the login page:
header('Location: Login.php');
exit();
?>

<html>

<head>
    <script type="text/javascript">
        function preback(){window.  history.forward();}
        setTimeout("preback()",0);
        window.onunload=function(){null};
    </script>
</head>    
</html>


<!-- check for msg and apply accordingly with Logout.php -->

