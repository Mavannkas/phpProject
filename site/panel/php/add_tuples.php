<?php
session_start();
include_once 'db.php'; 
if(!$conn->connect_error){
    
    function postToDB($sql){
        global $conn;
        $conn->select_db("makedb_user");
        $conn->query($sql);
        return $conn->error;
    }
    

    function genSQLStart($data){
        $sql="INSERT INTO `user_$_SESSION[id]` (";

        foreach ($data as $key=>$value) {
            $sql.="`$key`,";
        }
        $sql=substr($sql,0,-1).") VALUES ";
        return $sql;
        
    }
    
    function genSQL($data){
        $sql="";

        foreach($data as $element){
            $sql.="(";
            foreach($element as $value){
                $sql.='"'.$value.'",';
            }
            $sql=substr($sql,0,-1)."),";
        }

        return substr($sql,0,-1);
    }

    if(!empty($_SESSION['user'])){
        $input = json_decode(file_get_contents('php://input'), true);

        if($input){
                $sql=genSQLStart($input[0]);
                $sql.=genSQL($input);
                $err=postToDB($sql);
                if($err){
                    echo json_encode(array('message'=>$err));
                }else{
                    echo json_encode(array('success'=>"ok"));
                    $conn->select_db("makedb");
                    $conn->query("INSERT INTO db_DATA_change(user_id_fk) VALUES ($_SESSION[id])");
                }
            
            
            
        }else{
            echo json_encode(array('message'=>"Nieprawidłowe dane"));
        }
        
    }else{
        echo json_encode(array('message'=>"No sign-in"));
    }
    
}else{
    echo json_encode(array('message'=>"Brak połączenia z bazą danych"));
}
?>