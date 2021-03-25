<?php 
if(file_exists ('php/db.php')){
    require_once 'php/db.php';
    

    
    if(!$conn->connect_error){
        if(execute("DROP TABLE user_$_SESSION[id]","m21358_makedb_user")){
            if(execute("UPDATE users SET login=null, email=null, deleted=1 WHERE user_id=$_SESSION[id]","m21358_makedb")){
                if(file_exists("../user_img/".$_SESSION['user'].'.png')){
                    unlink("../user_img/".$_SESSION['user'].'.png');
                }
                if(!isset($_SESSION['admin_data'])){
                    session_destroy();
                }else{

                }
                echo "Poprawnie usunięto konto";
            }
        }
    }
}
?>