<?php
include_once 'db.php';
if(!$conn->connect_error){
  function getUserData($nick){
    global $conn;
    $conn->select_db("makedb");
    $sql="SELECT * FROM users WHERE BINARY login='$nick' and is_active=1";
    $result=$conn->query($sql);
    
    if($result && $result->num_rows){
      return $result->fetch_assoc();
    }else{
      return false;
    }
  }
  
  function addLogin($id){
    global $conn;
    $conn->select_db("makedb");
    $sql="INSERT INTO login (user_id_fk) VALUES ($id)";
    $result=$conn->query($sql);
  }
  
  
  
  if (!empty($_POST['login']) && !empty($_POST['pass']))
  {
    $data=getUserData($_POST['login']);
    if($data && password_verify($_POST['pass'], $data['password_hash'])){
      $temp=array(
        'user'=>$data['login'],
        'id'=>$data['user_id'],
        'img'=>$data['has_img'],
        'admin'=>$data['is_admin'],
        'db'=>$data['has_database']
      );
      
      foreach($temp as $key=>$value){
        $_SESSION[$key]=$value;
      }
      
      addLogin($data['user_id']);
      $location='http://'.$_SERVER['HTTP_HOST'];
      header("Location: $location");
    }else{
      echo "Błędne dane logowania";
    }
    
  }
}
  
?>