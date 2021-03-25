<?php
include_once 'db.php';
if(!$conn->connect_error){


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


if(!empty($_POST['send-mail'])){
    $data=execute("SELECT email, login, register_hash FROM users WHERE user_id=$_SESSION[id]",'m21358_makedb');
    if($data){
        $data=$data->fetch_assoc();
        sendMail($data['email'], $data['login'], $data['register_hash']);
        echo "Wysłano maila na address <b>$data[email]</b>";
    }
}


}
?>