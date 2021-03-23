<?php
include_once 'db.php';
if(!$conn->connect_error){
  function isNotInDB($name,$value){
    global $conn;
    $conn->select_db("m21358_makedb");
    $sql="SELECT $name FROM users WHERE $name='$value'";
    $result = $conn->query($sql);
    
    if(($result && $result->num_rows) || !$result){
      return false;
    }else{
      return true;
    }
  }
  function createDB($name){
    global $conn;
    $conn->select_db("m21358_makedb_user");
    $sql="CREATE TABLE user_$name(
    id int not null AUTO_INCREMENT,
    PRIMARY KEY (id)
  )";
  $result=$conn->query($sql);
}

function createAccount($login,$mail,$password, $reg){
  global $conn;
  $conn->select_db("m21358_makedb");
  $hash=password_hash($password, PASSWORD_DEFAULT);
  $sql="INSERT INTO users(login, email, password_hash, register_hash) VALUES ('$login','$mail','$hash', '$reg')";
  $result = $conn->query($sql);
  
  if($result){
    return true;
  }else{
    return false;
  }
}

function getID($login){
  global $conn;
  $conn->select_db("m21358_makedb");
  $sql="SELECT user_id FROM users WHERE login='$login'";
  $result = $conn->query($sql);
  
  if($result && $result->num_rows){
    return $result->fetch_assoc()['user_id'];
  }else{
    return false;
  }
}

function sendMail($mail, $login, $hash){
  $sub="Weryfikacja konta";
  $location='http://'.$_SERVER['HTTP_HOST'];
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $headers[] = 'From: Weryfikacja konta <noreply@miensny.ct8.pl>';
  $message='
  <html>
  <head>
  <title>Weryfikacja konta</title>
  </head>
  <body>
  <p>Witaj, <strong>'.$login.'</strong> dziękuję za rejestrację!</p>
  <p> Jeśli ty zakładałeś konto kliknij <a href="'.$location.'/verify.php?email='.$mail.'&hash='.$hash.'">tutaj</a>. Jeśli nie, zignoruj wiadomość</p>
  </body>
  </html>
  ';
  
  mail($mail, $sub, $message,implode("\r\n", $headers));
}

if (!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['password']))
{
  $login=htmlspecialchars($_POST['login']);
  $bool=0;
  if(mb_strlen($login)>3){
    if(!isNotInDB('login', $login)){
      $bool++;
      echo "Login zajęty<br>";
    }
  }else{
    $bool++;
    echo "Login zbyt krótki<br>";
  }
  
  $mail=strtolower(htmlspecialchars($_POST['mail']));
  if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
    if(!isNotInDB('email', $mail)){
      $bool++;
      echo "Mail zajęty<br>";
    }
  }else{
    $bool++;
    echo "Błędny email<br>";
  }
  
  $uppercase = preg_match('@[A-Z]@', $_POST['password']);
  $lowercase = preg_match('@[a-z]@', $_POST['password']);
  $number    = preg_match('@[0-9]@', $_POST['password']);
  $specialChars = preg_match('@[^\w]@', $_POST['password']);
  
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8){
    $bool++;
    echo "Hasło nie spełnia wymagań<br>";
  }
  
  if($bool==0){
    $reg_hash=md5(rand(0,1000));
    if(createAccount($login, $mail, $_POST['password'],$reg_hash)){
      echo '<p style="color:green; text-align:center">Udało się utworzyć konto. Musisz je jeszcze aktywować, wiadomość została wysłana na <b>'.$mail.'</b></p>';
      createDB(getID($login));
      sendMail($mail, $login, $reg_hash);
    }else{
      echo 'Nie udało się stworzyć konta';
    }
  }
  
}

}
?>