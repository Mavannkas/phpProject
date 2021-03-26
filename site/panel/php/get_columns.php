<?php 
include_once 'db.php';

if(!$conn->connect_error && session_status()==2){
    
    $result=getDescribe('%');
    if($result){

        $result->fetch_assoc();
        while($row=$result->fetch_assoc()){
            $type=$row['Type'];
            if($type=='int(11)'){
                $type='int';
            }else if($type=="varchar(10000)"){
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
            <input type="checkbox" name="isNull" value="$row[Null]" disabled>
            <label for="isNull"></label>
            </td>
            <td class="checkboxContainer">
            <input type="checkbox" name="isPrimary" value="$row[Key]" disabled>
            <label for="isPrimary"></label>
            </td></tr>
            end;
        }
    }
}
    ?>