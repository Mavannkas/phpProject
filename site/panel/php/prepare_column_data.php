<?php 
include_once 'db.php';

if(!$conn->connect_error && session_status()==2){
    $result=getDescribe('%');
    if($result){

        $result->fetch_assoc();
        while($row=$result->fetch_assoc()){
            $null=$row['Null'];
            
            if($null=="YES"){
                $null="true";
            }else{
                $null="false";
            }
            
            $type=$row['Type'];
            if($type=='int(11)'){
                $type='int';
            }else if($type=="varchar(10000)"){
                $type='varchar';
            }
            
            $row['Default']=str_replace("'","",$row['Default']);
            
            echo<<<end
            <th data-type="$type" data-start="$row[Default]" data-null="$null">$row[Field]</th>
            end;
        }
    }
}
?>