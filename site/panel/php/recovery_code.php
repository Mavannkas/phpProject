<?php 
include_once 'db.php';

    function sendMail($mail,$name, $pass){
    $sub="Potwierdzenie wysłania wiadomości";

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: Odzyskiwanie hasła <noreply@makedb.pl>';
    $message='
    <html>
      <head>
        <title>Nowe hasło</title>
      </head>
      <body>
        <p>Witaj, <strong>'.$name.'</strong> oto twoje nowe hasło!</p>
        <br>
        <p>hasło:'.$pass.'</p>
        <br>
        <br>
        <p>Zawsze możesz je zmienić w edycji konta.</p>
        <p>Upewnij się, że aktywowałeś konto.</p>
      </body>
    </html>
  ';
    return mail($mail, $sub, $message,implode("\r\n", $headers));
    }

    function getUserData($mail){
        global $conn;
        $conn->select_db("makedb");
        $sql="SELECT login FROM users WHERE email='$mail'";
        $result=$conn->query($sql);
  
        if($result && $result->num_rows){
          return $result->fetch_assoc()['login'];
        }else{
          return false;
        }
      }


    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    function updateHash($email, $pass){
        global $conn;
        $conn->select_db("makedb");
        $hash=password_hash($pass, PASSWORD_DEFAULT);
        $sql="UPDATE users SET password_hash='$hash' WHERE email='".$email."'";
        $result=$conn->query($sql);
        return $result;
    }

    $bool=false;
if(!empty($_POST['email'])){
    $login=getUserData($_POST['email']);
    $pass=randomPassword();
    if($login){
        if(updateHash($_POST['email'], $pass)){
            if(sendMail($_POST['email'], $login, $pass)){
                echo "<p class='success--output'>Niedługo otrzymasz maila z nowym hasłem</p>";
                $bool=true;
            }
        }
    }

    if(!$bool){
        echo "<p class='error--output'>Nie znaleziono takiego maila lub wystąpił błąd</p>";
    }
}
?>