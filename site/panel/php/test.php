
<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Credentials: GET');
// header('Access-Control-Allow-Credentials: text/plain');


session_start();
setcookie('user',  "XD", [
    'expires' => time()+(7*24*3600),
    'path' => '/',
    'domain' => '.smartmargo.pl',
    'SameSite' => 'None',
    'secure' => true
  ] );
echo 'xd',$_COOKIE['user'];
?>

<script>
    
</script>