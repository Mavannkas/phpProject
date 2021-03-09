<?php 
 include_once 'panel/php/db.php';


    function findMail($mail,$hash){
     global $conn;
     $conn->select_db("makedb");
     $sql="SELECT * FROM users WHERE email='$mail' and register_hash='$hash' and is_active!=1";
     $result = $conn->query($sql);
     if(($result && $result->num_rows)){
      return true;
     }else{
      return false;
     }
  }

  function activeUser($mail){
    global $conn;
    $conn->select_db("makedb");
    $sql="UPDATE users SET is_active=1 WHERE email='$mail'";
    $result = $conn->query($sql);
 
    return $result;
  }

    if(!empty($_GET['email']) && !empty($_GET['hash'])){
        if(findMail($_GET['email'], $_GET['hash'])){
            if(activeUser($_GET['email'])){
                echo 'Poprawnie aktywowano konto <br>';
            }
        }
    }

    echo '<a href="index.php">Przejdź na stronę główną</a>';
?>