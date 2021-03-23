<?php 

    include_once 'db.php';
    if(!$conn->connect_error){
        function getHash(){
            global $conn;
            $conn->select_db("m21358_makedb");
            $sql="SELECT password_hash FROM users WHERE user_id='".$_SESSION['id']."'";
            $result=$conn->query($sql);
            if($result && $result->num_rows){
                return $result->fetch_assoc()['password_hash'];
            }else{
                return false;
            }
        }
        
        function updateHash($pass){
            global $conn;
            $conn->select_db("m21358_makedb");
            $hash=password_hash($pass, PASSWORD_DEFAULT);
            $sql="UPDATE users SET password_hash='$hash' WHERE user_id=".$_SESSION['id'];
            $result=$conn->query($sql);
            return $result;
        }
        
        if(!empty($_POST['oldPass']) || !empty($_POST['pass'])){
            
            $hash=getHash();
            
            if($hash && password_verify($_POST['oldPass'],$hash)){
                if(updateHash($_POST['pass'])){
                    echo "<p class='success--output'>Udało się zmienić hasło</p>";
                }else{
                    echo "<p class='error--output'>Nie udało się zmienić hasła</p>";
                }
            }else{
                echo "<p class='error--output'>Złe hasło :(</p>";
            }
        }
        
}
?>