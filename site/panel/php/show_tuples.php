<?php 
include_once 'db.php';

function postToDB($sql){
    global $conn;
    $conn->select_db("m21358_makedb_user");
    $result=$conn->query($sql);
    return $result;
}

function genTemplate($res){
    $rows=postToDB("SHOW COLUMNS FROM user_$_SESSION[id]");
    $rows->fetch_assoc();
    $result=array(array('<tr id="tuple-$NUMBER">'));
    $keys=array_keys($res);
    while($row=$rows->fetch_assoc()){
        if(array_search($row['Field'], $keys)!==false){
            $type=$row['Type'];

            if($type=='int(11)'){
                $type='int';
            }else if($type=='varchar(10000)'){
                $type="varchar";
            }
            array_push($result,array('<td data-type="'.$type.'">$VALUE</td>',$row['Field']));
        }
    }
    array_push($result,array('</tr>'));
        
    return $result;
}

function showTH($data){
    if(isset($data)){

        $nameArr=array_keys($data);
        
        foreach($nameArr as $name){
            if($name!='id'){
                echo "<th>$name</th>";
            }
        }
    }
}

function createRows($template, $arr){
    for($i=0;$i<count($arr);$i++){
        echo str_replace('$NUMBER',$arr[$i]['id'],$template[0][0]);
        for($j=1;$j<count($template)-1;$j++){
            echo str_replace('$VALUE',$arr[$i][$template[$j][1]],$template[$j][0]);
        }
        echo $template[count($template)-1][0];
    }
}

if(!$conn->connect_error){
    if($query){

        $result=postToDB($query);
        if(gettype($result)=="boolean" && $result==true){
            echo "<p class='success--output'>Poprawnie wykonano zapytanie</p>";
        }else if($result==false){
            $error=str_replace("user_$_SESSION[id]",'$table',$conn->error);
            $error=str_replace(";",';<br>',$error);
            echo "<p class='error--output'>$error</p>";
        }else{
            $resultArray=array();
            while($row=$result->fetch_assoc()){
                array_push($resultArray,$row);
            }
        }
    }
}
?>