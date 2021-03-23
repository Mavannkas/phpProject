<?php 
include_once 'db.php'; 
if(!$conn->connect_error){
    $result=getDescribe('%');
    if($result){
        $result->fetch_assoc();
        while($row=$result->fetch_assoc()){
            echo "<option value='$row[Field]'>$row[Field]</option>";
        }
    }
}
?>