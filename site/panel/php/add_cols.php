<?php
session_start();
include_once 'db.php'; 

    function getLastColumnName(){
        global $conn;
        $sql="SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'makedb_user' AND TABLE_NAME ='user_".$_SESSION['id']."' ORDER BY ORDINAL_POSITION DESC LIMIT 1";
        $result=$conn->query($sql);

        if($result && $result->num_rows){
            return $result->fetch_assoc()['COLUMN_NAME'];
        }else{
            return false;
        }
    }

    function expandTable($data, $last){
        $sql="ALTER TABLE user_".$_SESSION['id']." ";
        
        foreach ($input as $key=>$value) {
            echo "[$key]{<br>";
            foreach ($value as $k => $val) {
                    echo "$k=>$val<br>";
            }
            echo "}<br>";
        }//dokończyć XD
    }

if(!empty($_SESSION['user'])){
    $input = json_decode(file_get_contents('php://input'), true);
    if($input){
    //    echo json_encode(array('message'=>"Coś się zjebało"));
        $lastColumn=getLastColumnName();
        if($lastColumn){
           expandTable($input,$lastColumn);
        }


    }else{
       echo json_encode(array('message'=>"Nieprawidłowe dane"));
    }
    
}else{
    echo json_encode(array('message'=>"No sign-in"));
}

?>