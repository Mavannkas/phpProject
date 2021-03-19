<?php 

function getDescribe($name){
    global $conn;
    $conn->select_db("makedb_user");
    $sql="SHOW COLUMNS FROM user_$_SESSION[id] WHERE Field like '$name'";

    $result=$conn->query($sql);
    if($result && $result->num_rows){
        return $result;
    }else{
        return false;
    }
}

    $server='localhost';
    $user="root";
    $password="";
    $conn=@new mysqli($server, $user, $password);

    if($conn->connect_error){
        echo "<script>alert('Połączenie z DB nieudane')</script>" ;
    }
?>