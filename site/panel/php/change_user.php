<?php 

if(file_exists ('php/db.php')){
    function setUser($nick, $id, $is="1", $email=""){
        $_SESSION['user']=$nick;
        $_SESSION['id']=$id;
        $_SESSION['active']=$is;
        $_SESSION['email']=$email;
    }   
    if(!$conn->connect_error){
        if(!empty($_POST['erase'])){
            setUser($_SESSION['admin_data']['user'], $_SESSION['admin_data']['id']);
        }else if(!empty($_POST['user'])){
            $user=execute("SELECT user_id, login, is_active, email FROM users WHERE login='$_POST[user]'", "m21358_makedb");
            if($user){
                $user=$user->fetch_assoc();
                setUser($user['login'], $user['user_id'], $user['is_active'], $user['email']);
            }
        }
    }
}
?>