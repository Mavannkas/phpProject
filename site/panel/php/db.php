<?php 
    $server='localhost';
    $user="root";
    $password="";
    $conn=@new mysqli($server, $user, $password);

    if($conn->connect_error){
        echo "<script>alert('Połączenie z DB nieudane')</script>" ;
    }
?>