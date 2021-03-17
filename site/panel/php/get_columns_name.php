<?php 
include_once 'db.php'; 
if(!$conn->connect_error){
    function getDescribe(){
        global $conn;
        $conn->select_db('makedb_user');
        $sql="DESCRIBE user_".$_SESSION['id'];
        $result=$conn->query($sql);
        $result->fetch_assoc();
        return $result;
    }
    
    $result=getDescribe();
    while($row=$result->fetch_assoc()){
        echo "<option value='$row[Field]'>$row[Field]</option>";
    }
}
?>