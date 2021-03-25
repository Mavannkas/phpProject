<?php session_start();
$location='http://'.$_SERVER['HTTP_HOST'];

if(empty($_SESSION['user']) && (empty($_GET['lvl']) || ($_GET['lvl']!='login' && $_GET['lvl']!='recovery' &&$_GET['lvl']!='register'))){
    header("Location: $location/panel/?lvl=login");

}else if(!empty($_SESSION['user']) && !empty($_GET['lvl']) && ($_GET['lvl']=='login' || $_GET['lvl']=='register')){
        header("Location: $location/panel/");
}else if( !empty($_SESSION['user']) && $_SESSION['db']!=1 && $_GET['lvl']!='addColumns' && $_GET['lvl']!='edit'){
    header("Location: $location/panel/?lvl=addColumns");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b19284fe65.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/panel.css">
    <title>Panel MakeDB</title>
    <link rel="icon" href="../img/unknown.png" type="image/icon type">

</head>
<body>
    <header class="header">
        <a href="./?lvl=showTable" class="header__back" ><i class="fas fa-home"></i></a>
        <a class="header__logo" href="../"><i class="fas fa-database"></i>Make<span>DB</span></a>
        <div class="header__profile">
            <div class="header__profile-head">
                <img src="<?php 
                    if(file_exists('../user_img/'.$_SESSION['user'].'.png')){
                        echo '../user_img/'.$_SESSION['user'].'.png';
                    }else{
                        echo '../img/user.svg';
                    }
                ?>" alt="user profile" class="header__profile-img" width="40px" onerror="this.onerror=null; this.src='../img/user.svg'"></img>
                <p class="header__profile-name"><?php echo empty($_SESSION['user'])?'Gość':$_SESSION['user']; ?> <i class="fas fa-caret-down"></i></p>
            </div>
            <div class="header__dropdown-menu">
                <ul>
                    <?php if(empty($_SESSION['user'])):?>
                        <li><a href="./?lvl=login">Logowanie</a></li>
                        <hr>
                        <li><a href="./?lvl=register">Rejestracja</a></li>
                    <?php else:?>
                        <?php if($_SESSION['admin']==1):?>
                            <li><a href="./?lvl=admin">Panel Admina</a></li>
                        <?php endif; ?>
                        <li><a href="./?lvl=edit">Edycja Konta</a></li>
                        <hr>
                        <li><a href="./?logout=1" class='logout'>Wyloguj się</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <?php if(!empty($_SESSION['user'])):?>
        <aside>
            <nav class="nav">
                <i class="fas fa-bars nav-btn"></i>
                <ul class="list">
                    <li class="list__main-fun"><a href="./?lvl=showTable">Podgląd</a></li>
                    <li class="list__main-fun"><a href="./?lvl=addData">Dodaj krotki</a></li>
                    <li class="list__main-fun expand"><a href="#">Edycja tabeli <i class="fas fa-caret-down"></i></a>
                        <ul class="list__secondary">
                            <li class="list__secondary-element"><a href="./?lvl=addColumns">Dodaj kolumny</a></li>
                            <li class="list__secondary-element"><a href="./?lvl=editColumn">Edytuj kolumnę</a></li>
                            <li class="list__secondary-element"><a href="./?lvl=truncate">Truncate</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <?php endif; ?>
        <section>
            <?php 
                if(!empty($_GET['lvl'])){
                if($_GET['lvl']=="admin" && $_SESSION['admin']!=1){
                    $_GET['lvl']="showTable";
                }
                    if(file_exists('./'.$_GET['lvl'].'.php')){
                        require_once './'.$_GET['lvl'].'.php';
                    }else{
                        echo '<h1 style="color:red;">Nie znaleziono oczekiwanego pliku</h1>';
                    }
                }else if(!empty($_GET['logout']) && $_GET['logout']=="1"){
                    echo "<section class='info-box'>";
                    echo "<p>Poprawnie wylogowano</p>";
                    echo "<p>Żegnaj <span>".$_SESSION['user']."<span></p>";
                    echo "</section>";
                    session_destroy();
                }
                else{
                    require_once './showTable.php';
                }
            ?>
        </section>
    </main>
    <footer>
        <p>© <span class="footer__year"></span> <a href="https://mavannkas.github.io" target="_blank"> Zmienić pózniej</a></p>
    </footer>
    <div class="small-device">
        <p>Za mały ekran</p>
        <div class="dev-img-box">
            <i class="fas fa-mobile-alt phone"></i>
        </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
      <script src="../js/panel.js"> </script>
      <script src="../js/popup.js"></script>
</body>
</html>