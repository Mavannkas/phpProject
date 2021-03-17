<?php 
    function genSQL($value, $old){
        $sql="ALTER TABLE `user_".$_SESSION['id']."` CHANGE `$old` ";
        $sql.="`".$value['name']."` ".$value['type'];
        if($value['type']=="VARCHAR"){
            $sql.="(65535)";
        }
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
        return substr($sql,0,-1);
    } 

    function sendSQLToDB($sql){
        global $conn;
        $conn->select_db("makedb_user");
        return $conn->query($sql); 
    }

    $_POST['isNull']=!empty($_POST['isNull'])?1:0;
    $data=array(
        'type'=>$_POST['type'],
        'name'=>$_POST['columnName'],
        'null'=>$_POST['isNull'],
        'value'=>$_POST['startValue']
    );
    $sql=genSQL($data,$_POST['oldName']);
    if(sendSQLToDB($sql)){
        $conn->select_db("makedb");
        $conn->query("INSERT INTO db_change(user_id_fk) VALUES ($_SESSION[id])");
        echo "Udało się edytować";
    }

?>