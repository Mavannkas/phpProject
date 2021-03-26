<?php 
if(file_exists ('php/db.php')){
    require_once 'php/db.php';

    if(!$conn->connect_error){
        if(!empty($_POST['login'])){
            $login=htmlspecialchars($_POST['login']);
            if(execute("SELECT * FROM users WHERE login='$login'", "m21358_makedb")->num_rows){
                echo "<p class='error--output'>Login $login jest zajęty</p>";
            }else{
                $user=execute("UPDATE users SET login = '$login' WHERE user_id=$_SESSION[id]", "m21358_makedb");
                if($user){
                    echo "<p class='success--output'>Zmieniono login z $_SESSION[user] na $login</p>";
                    $_SESSION['email']=$login;
                }
            }
        }
    }
}
?>