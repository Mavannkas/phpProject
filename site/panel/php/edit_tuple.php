<?php
session_start();
include_once 'db.php';
if(!$conn->connect_error){

    function postToDB($sql){
        global $conn;
        $conn->select_db("m21358_makedb_user");
        $conn->query($sql);
        return $conn->error;
    }

    function genSQL($data, $id){
        $sql="UPDATE user_$_SESSION[id] SET ";
        
        foreach($data as $key=>$value){
            $sql.="`$key`='$value', ";
        }
        $sql=substr($sql,0,-2);
        $sql.=" WHERE id=$id";

        return $sql;
    }

    if(!empty($_SESSION['user'])){
        $input = json_decode(file_get_contents('php://input'), true);
        if($input){
            if(isset($input['id'])){
                $id=$input['id'];
                unset($input['id']);
                $sql=genSQL($input, $id);
                if(postToDB($sql)){
                    echo json_encode(array('message'=>$conn->error));
                }else{
                    $conn->select_db("m21358_makedb");
                    $conn->query("INSERT INTO db_data_change(user_id_fk) VALUES ($_SESSION[id])");
                    echo json_encode(array('ok'=>"ok"));
                }
            }else{
                echo json_encode(array('message'=>"Brak Kolumny id"));
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