<?php

try{
    $db = new mysqli("localhost", "root", "", "contactdatabase");

}catch(Exception $exc){
    echo $exc->getTraceAsstring();
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mob']) && isset($_POST['msg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $msg = $_POST['msg'];

    $is_insert =  $db->query("INSERT INTO `contact`(`name`, `email`, `mobilenumber`, `message`) VALUES ('$name','$email','$mob','$msg')");

    if($is_insert == TRUE){
        echo "<h2> Thankyou, Your request is submitted. <h2>";
        echo "<br>";
        echo "<br>";
        echo nl2br('<a href="Home.html">Return To Home Page</a>');
        echo "<br>";
        echo "<br>";
        exit();
    }

}

?>