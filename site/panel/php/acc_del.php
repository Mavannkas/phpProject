<?php 
require_once 'php/db.php';

function execute($sql, $db){
    global $conn;
    $conn->select_db($db);
    return $conn->query($sql);
}


function deleteIMG(){

}


if(execute("DROP TABLE user_$_SESSION[id]","makedb_user")){
    if(execute("UPDATE users SET login=null, email=null, deleted=1 WHERE user_id=$_SESSION[id]","makedb")){
        $patch=realpath($_SERVER["DOCUMENT_ROOT"]).'\PHP_PROJEKT\site\user_img';
        $name=$_SESSION['user'].'.png';
        unlink($patch."\\".$name);
        session_destroy();
        echo "Poprawnie usunięto konto";
    }
}
?>