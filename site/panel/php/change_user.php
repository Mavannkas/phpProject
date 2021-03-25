<?php 

if(file_exists ('php/db.php')){
    function setUser($nick, $id){
        $_SESSION['user']=$nick;
        $_SESSION['id']=$id;
    }   
    if(!$conn->connect_error){
        if(!empty($_POST['erase'])){
            setUser($_SESSION['admin_data']['user'], $_SESSION['admin_data']['id']);
        }else if(!empty($_POST['user'])){
            $user=execute("SELECT user_id, login FROM users WHERE login='$_POST[user]'", "m21358_makedb");
            if($user){
                $user=$user->fetch_assoc();
                setUser($user['login'], $user['user_id']);
            }
        }
    }
}
?>