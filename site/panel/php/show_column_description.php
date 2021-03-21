<?php 
require_once "php/db.php";


$data=getDescribe($_POST['col'])->fetch_assoc();
if($data){

    $data['Default']=str_replace("'","",$data['Default']);
    $name=$data['Field'];
    $type=$data['Type'];
    if($type=='int(11)'){
        $type='int';
    }else if($type=="mediumtext"){
        $type='varchar';
    }
    $type=strtoupper($type);
    $null=$data['Null']=="YES"?1:0;
    $key=$data['Key']=="UNI"||$data['Key']=="PRI"?1:0;
    echo<<<end
    <tr>
    <td>
    <input type="text" name="columnName" id="columnName" value="$name" required>
    </td>
    <td>
    <select name="type" id="type" value-type="$type">
    <option value="INT">INT</option>
    <option value="FLOAT">FLOAT</option>
    <option value="VARCHAR">VARCHAR</option>
    <option value="TEXT">TEXT</option>
    <option value="DATE">DATE</option>
    <option value="TIME">TIME</option>
    <option value="TIMESTAMP">TIMESTAMP</option>
    </select>
    </td>
    <td>
    <input type="text" name="startValue" value="$data[Default]" id="startValue">
    </td>
    <td class="checkboxContainer">
    <input type="checkbox" name="isNull" value="$null" id="isNull">
    <label for="isNull"></label>
    </td>
    <td class="checkboxContainer">
    <input type="checkbox" name="isPrimary" value="$key" id="isPrimary" disabled>
    <label for="isPrimary"></label>
    </td>
    </tr>
    end;
}
    ?>