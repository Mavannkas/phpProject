<?php 
    $server='localhost';
    $user="root";
    $password="";
    $conn=new mysqli($server, $user, $password);

    if($conn->connect_error){
        die("Połączenie z DB nieudane");
    }
?>