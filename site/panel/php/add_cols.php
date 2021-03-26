<?php
session_start();
include_once 'db.php'; 
if(!$conn->connect_error){
    function getLastColumnName(){
        global $conn;
        $sql="SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'm21358_makedb_user' AND TABLE_NAME ='user_".$_SESSION['id']."' ORDER BY ORDINAL_POSITION DESC LIMIT 1";
        $result=$conn->query($sql);
        
        if($result && $result->num_rows){
            return $result->fetch_assoc()['COLUMN_NAME'];
        }else{
            return false;
        }
    }
    
    function postToDB($sql){
        global $conn;
        $conn->select_db("m21358_makedb_user");
        $conn->query($sql);
        return $conn->error;
    }
    
    function genSQL($data, $last){
        $sql="ALTER TABLE `user_".$_SESSION['id']."` ";
        $unique="";
        foreach ($data as $value) {
            if($value['type']=="VARCHAR"){
                $value['type']="VARCHAR(10000)";
            }
            if($value['type']=="TEXT")
                $value['value']="";
            
            $sql.="ADD `".$value['name']."` ".$value['type'];
            $sql.=" ";
            if($value['null']!=1){
                $sql.="NOT ";
            }
            $sql.="NULL ";
            if($value['value']!=""){
                $sql.="DEFAULT ";
                if(strtolower($value['value'])=='null'){
                    $sql.="NULL ";
                }else if(strtolower($value['value'])=="current_timestamp"){
                    $sql.="CURRENT_TIMESTAMP ";
                }else{
                    $sql.="'".$value['value']."' ";
                }
            }
            $sql.="AFTER `$last`, ";
            $last=$value['name'];
            
            if($value['primary']==1){
                $unique.="ADD UNIQUE (`".$value['name']."`), ";
            }
        }
        $sql.=$unique;
        return substr($sql,0,-2);
        
    }
    
    if(!empty($_SESSION['user'])){
        $input = json_decode(file_get_contents('php://input'), true);
        if($input){

            $lastColumn=getLastColumnName();
            if($lastColumn){
                $sql=htmlspecialchars(genSQL($input,$lastColumn));
                $err=postToDB($sql);
                if($err){
                    echo json_encode(array('message'=>$err));
                }else{
                    echo json_encode(array('success'=>"ok"));
                    $conn->select_db("m21358_makedb");
                    $conn->query("UPDATE users SET has_database=1");
                    $conn->query("INSERT INTO db_change(user_id_fk) VALUES ($_SESSION[id])");
                    $_SESSION['db']=1;
                }
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