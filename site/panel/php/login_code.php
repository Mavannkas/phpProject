<?php
include_once 'db.php';

    function getHash($nick){
      global $conn;
      $conn->select_db("makedb");
      $sql="SELECT login, password_hash FROM users WHERE BINARY login='$nick' and is_active=1";
      $result=$conn->query($sql);

      if($result && $result->num_rows){
        return $result->fetch_assoc();
      }else{
        return false;
      }
    }



if (!empty($_POST['login']) && !empty($_POST['pass']))
  {
    $data=getHash($_POST['login']);
  if($data && password_verify($_POST['pass'], $data['password_hash'])){
    $_SESSION['user']=$data['login'];
    header("Location: http://localhost/PHP_PROJEKT/site/");
  }else{
    echo "Błędne dane logowania";
  }
         
}

?>