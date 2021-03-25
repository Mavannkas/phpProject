<?php 

if(file_exists ('php/db.php')){
    require_once 'php/db.php';
    
    if(!$conn->connect_error){
        $users=execute("SELECT login, is_active FROM users WHERE login is not null and is_admin=0", "m21358_makedb");
        foreach($users as $row){
            echo "<option value='$row[login]' active='$row[is_active]'>$row[login]</option>";
        }
    }
}
?>