<?php 
if(file_exists ('php/db.php')){
    require_once 'php/db.php';

    if(!$conn->connect_error){
        if(!empty($_POST['newMail'])){
            $mail=htmlspecialchars($_POST['newMail']);
            if(execute("SELECT * FROM users WHERE email='$mail'", "m21358_makedb")->num_rows){
                echo "<p class='error--output'>Mail $mail jest zajęty</p>";
            }else{
                $user=execute("UPDATE users SET email = '$mail' WHERE user_id=$_SESSION[id]", "m21358_makedb");
                if($user){
                    echo "<p class='success--output'>Zmieniono mail z $_SESSION[email] na $mail</p>";
                    $_SESSION['email']=$mail;
                }
            }
        }
    }
}
?>