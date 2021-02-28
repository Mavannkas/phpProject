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
                <img src="../img/user.svg" alt="user profile" class="header__profile-img" width="40px"></img>
                <p class="header__profile-name">Gość <i class="fas fa-caret-down"></i></p>
            </div>
            <div class="header__dropdown-menu">
                <ul>
                    <li><a href="./?lvl=login">Logowanie</a></li>
                    <li><a href="./?lvl=register">Rejestracja</a></li>
                    <hr>
                    <li><a href="./?lvl=edit">Edycja Konta</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
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
        <section>
            <?php 
                if(!empty($_GET['lvl'])){
                    if(file_exists('./'.$_GET['lvl'].'.php')){
                        require_once './'.$_GET['lvl'].'.php';
                    }else{
                        echo '<h1 style="color:red;">Nie znaleziono oczekiwanego pliku</h1>';
                    }
                }else{
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