<?php

include "dbcon.php";
session_start();
      include('dbcon.php');
      if(!isset($_SESSION['loggedin'])){
        header('Location:Login.php');
        exit();
      }

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `buy` WHERE `id`='$id' ");
}




$select = "select * from  buy  ORDER BY buy.id DESC";
$query = mysqli_query($conn, $select);


?>

<!DOCTYPE html> 
<html>
    <head>
    <link rel="icon" href="../images/chrome logo33.png" type="image/ico">
        <title> Data for Buy</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th{
            background-color : #588c7e;
            color: white;
        }
        .button{
            background-color : #588c7e;
            color: white;
            font-size: 1.2em;
            padding: 5px 30px;
            text-decoration: none;
        }
        .button:hover{
            background: darked;
            color: #fff;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    
    
    
    </head>
    
    <body>
        

        <table>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>email</th>
                <th>mob number</th>
                <th>message</th>
                <th>Operations</th>
            </tr>
            <?php
            
                $num = mysqli_num_rows($query);
                if ($num>0){
                    while($result = mysqli_fetch_assoc($query)){
                        echo "
                        <tr>
                        <td>". $result["id"] ."</td>
                        <td>". $result["name"] ."</td>
                        <td>". $result["email"] ."</td>
                        <td>". $result["mobilenumber"] ."</td>
                        <td>". $result["message"]."</td>  
                        <td>
                            <a href='Buydata.php?id=". $result["id"] ."'>Delete</a>
                        </td>
                        </tr>";
                       
                        //header('Refresh: 800; URL = Buydata.php;');
                        
                    }
                }   
                
            ?>
        </table>
        <br>
        <br>
        <button class="GFG"><a href='Logout.php'>
            Logout
        </button>    
    </body>

    
    
</html>