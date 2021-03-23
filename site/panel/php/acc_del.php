<?php 
if(file_exists ('php/db.php')){
    require_once 'php/db.php';
    
    function execute($sql, $db){
        global $conn;
        $conn->select_db($db);
        return $conn->query($sql);
    }
    
    if(!$conn->connect_error){
        if(execute("DROP TABLE user_$_SESSION[id]","m21358_makedb_user")){
            if(execute("UPDATE users SET login=null, email=null, deleted=1 WHERE user_id=$_SESSION[id]","m21358_makedb")){
                unlink("../user_img/".$_SESSION['user'].'.png');
                session_destroy();
                echo "Poprawnie usunięto konto";
            }
        }
    }
}
?>