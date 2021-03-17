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
        $type=$row['Type'];
        if($type=='int(11)'){
            $type='int';
        }else if($type=="mediumtext"){
            $type='varchar';
        }
        echo<<<end
        <tr>
        <td>
        <input type="text" value="$row[Field]" disabled>
        </td>
        <td>
        <input type="text" value="$type" disabled>
        </td>
        <td>
        <input type="text" value="$row[Default]" disabled>
        </td>
        <td class="checkboxContainer">
        <input type="checkbox" name="isNull" id="isNull" value="$row[Null]" disabled>
        <label for="isNull"></label>
        </td>
        <td class="checkboxContainer">
        <input type="checkbox" name="isPrimary" id="isPrimary" value="$row[Key]" disabled>
        <label for="isPrimary"></label>
        </td></tr>
        end;
    }
}
    ?>