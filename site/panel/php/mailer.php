<?php 

function sendMail($name, $mail, $tel, $mess){
    $sub="Potwierdzenie wysłania wiadomości";

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: Potwierdzenie <noreply@makedb.pl>';
    $message='
    <html>
      <head>
        <title>Potwierdzenie wysłania wiadomości</title>
      </head>
      <body>
        <p>Witaj, <strong>'.$name.'</strong> dziękuję kontakt!</p>
        <br>
        <p>Wiadomość:</p>
        <br>
        <pre>'.$mess.'</pre>
        <br>
        <br>
        <p>Niedługo otrzymasz odpowiedź na numer '.$tel.'</p>
      </body>
    </html>
  ';
    return mail($mail, $sub, $message,implode("\r\n", $headers));
    }


    if(!empty($_GET['name']) && !empty($_GET['mail']) && !empty($_GET['tel']) && !empty($_GET['message'])){
        if(sendMail($_GET['name'], $_GET['mail'], $_GET['tel'], $_GET['message'])){
            echo "Udało się wysłać email";
        }else{
            echo "Coś poszło nie tak";
        }
    }
?>
