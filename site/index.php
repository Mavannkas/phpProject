<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b19284fe65.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/mian.css">
    <link rel="stylesheet" href="./css/animate.css">
    <title>MakeDB</title>
    <link rel="icon" href="./img/unknown.png" type="image/icon type">
</head>
<body data-spy="scroll" data-target="#navbar">
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="#"><i class="fas fa-database"></i>Make<span>DB</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto text-center">
              <a class="nav-link" href="#aboutus">Oferta</a>
              <a class="nav-link" href="#prices">Cennik</a>
              <a class="nav-link" href="#contact">Napisz do nas!</a>
              <?php if(empty($_SESSION['user'])):?>
                <a class="nav-link" href="#" id="log">Logowanie</a>
                <?php else:?>
                    <a class="nav-link" href="panel">Wejdź na panel</a>
                <?php endif; ?>
            </div>
          </div>
    </nav>
    <header>
        <div class="hero">
            <h1 class="header-title os-animation visibility" data-animation='flipInX' data-delay="0s">Make<span>DB</span></h1>
            <p class="header-text os-animation visibility" data-animation='flipInX' data-delay=".3s">Najlepsze bazy danych w necie!</p>
            <a class="btn os-animation visibility" data-animation='flipInX' href="#aboutus" data-delay=".6s">poznaj nas!</a>
        </div>
        <div class="shadow-bg"></div>
        <div class="whiteBlock whiteBlock--left"></div>
        <div class="whiteBlock whiteBlock--right"></div>
    </header>
    <main>
        <section class="aboutus section scroll-fix" id="aboutus">
            <div class="wrapper">
                <h2 class="section__title os-animation visibility"  data-animation='fadeIn'>Oferta</h2>
                <div class="section__body">
                    <div class="aboutus__galley">
                        <!-- <h3 class="aboutus__topTitle  os-animation visibility"  data-animation='fadeIn'>Informacje o firmie</h3> -->
                        <div class="aboutus__elements">
                            <div class="aboutus__elementOne">
                                <div class="aboutus__element one os-animation visibility"  data-animation='fadeIn' onclick="void(0)">
                                    <i class="fas fa-fingerprint"></i>
                                    <div class="aboutus__elementText">
                                        <h4 class="aboutus__elementTitle">Doświadczenie</h4>
                                        <p class="aboutus__elementDesctiption">Nasza kadra składa się tylko z doświadczonych pracowników, wiemy co robimy</p>
                                    </div>
                                </div>
                                <div class="aboutus__element two os-animation visibility"  data-animation='fadeIn' onclick="void(0)">
                            <div class="aboutus__elementText">
                                <h4 class="aboutus__elementTitle">Przyjaźń</h4>
                                <p class="aboutus__elementDesctiption">Wielu z nas zaczynało razem. Dobrze się znamy i uważamy to za naszą zaletę!</p>
                            </div>
                        </div>
                    </div>

                        <!-- <h3 class="aboutus__phoneTitle os-animation visibility"  data-animation='fadeIn'>Informacje o usłudze</h3> -->
                    <div class="aboutus__elementTwo">

                        <div class="aboutus__element three os-animation visibility"  data-animation='fadeIn' onclick="void(0)">
                            <i class="fas fa-fingerprint"></i>
                            <div class="aboutus__elementText">
                                <h4 class="aboutus__elementTitle">Łatwość obsługi</h4>
                                <p class="aboutus__elementDesctiption">Nasz produkt skierowany jest do każdego! Nawet osoba nieobeznana w tej dziedzinie nie poczuje się zagubiona</p>
                            </div>
                        </div>
                        <div class="aboutus__element four os-animation visibility"  data-animation='fadeIn' onclick="void(0)">
                            <div class="aboutus__elementText">
                                <h4 class="aboutus__elementTitle">Przyjazny wygląd</h4>
                                <p class="aboutus__elementDesctiption">Tworząc aplikację, chceliśmy aby poza funkcjonalnością była też miła dla oka. Sprawdź sam czy nam sie udało!</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- <h3 class="aboutus__bottomTitle  os-animation visibility"  data-animation='fadeIn'>Informacje o usłudze</h3> -->
                </div>
            </div>
            </div>
        </section>
        <section class="prices section scroll-fix" id="prices">
            <div class="shadow-bg"></div>
            <div class="whiteBlock whiteBlock--left"></div>
            <div class="whiteBlock whiteBlock--top-right"></div>
            <div class="whiteBlock whiteBlock--top-left"></div>
            <div class="whiteBlock whiteBlock--right"></div>
            <div class="prices__body">
                <h2 class="section__title os-animation visibility"  data-animation='fadeIn'>Cennik</h2>
                <div class="wrapper">
                    <div class="prices__btns">
                        <div class="prices__btn btn one os-animation visibility"  data-animation='fadeInLeftBig'>
                            <p>Light</p>
                        </div>
                        <div class="prices__btn btn two os-animation visibility"  data-animation='fadeInUpBig'>
                            <p>Normal</p>
                        </div>
                        <div class="prices__btn btn three os-animation visibility"  data-animation='fadeInRightBig'>
                            <p>Premium</p>
                        </div>
                    </div>
                    <div class="prices__boxes  os-animation visibility"  data-animation='fadeInUpBig'>
                        <div class="prices__box one">
                            <div class="prices__box-text">
                                <i class="fas fa-egg"></i>
                                <h3 class="prices__box-title">Light</h3>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-price">0</p>
                            </div>
                            <button class="prices__box-btn secondary-btn"><a href="./panel/?lvl=register">Zapisz się!</a></button>
                        </div>
                        <div class="prices__box two">
                            <div class="prices__box-text">
                                <i class="fas fa-cookie-bite"></i>
                                <h3 class="prices__box-title">Normal</h3>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-price">50</p>
                            </div>
                            <button class="prices__box-btn secondary-btn"><a href="./panel/?lvl=register">Zapisz się!</a></button>
                        </div>
                        <div class="prices__box three">
                            <div class="prices__box-text">
                                <i class="fas fa-medal"></i>
                                <h3 class="prices__box-title">Premium</h3>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-text">Lorem ipsum dolor sit amet.</p>
                                <hr>
                                <p class="prices__box-price">100</p>
                            </div>
                            <button class="prices__box-btn secondary-btn"><a href="./panel/?lvl=register">Zapisz się!</a></button>
                        </div>
                    </div>
                </div>
            </div>
 
        </section>
        <section class="contact section scroll-fix" id="contact">
            <div class="wrapper">
                <h2 class="section__title os-animation visibility"  data-animation='fadeIn'>Kontakt</h2>
                <div class="section__body">
                    <form action="#contact" method="get">
                        <p style="color:green; text-align:center">
                        <?php 
                         include_once 'panel/php/mailer.php';
                        ?>
                        </p>

                        <label for="name" class=" os-animation visibility"  data-animation='flipInX'>Imię i Nazwisko</label>
                        <input type="text" id="name" name="name" placeholder="Jan Nowak" required pattern="[\w\W]{2,} [\w\W]{2,}" class=" os-animation visibility"  data-animation='flipInX'>
                        <label for="mail" class=" os-animation visibility"  data-animation='flipInX'>Mail</label>
                        <input type="email" id="mail" name="mail" placeholder="jan.nowak@example.com" required class=" os-animation visibility"  data-animation='flipInX'>
                        <label for="tel" class=" os-animation visibility"  data-animation='flipInX'>Numer Telefonu</label>
                        <input type="tel" id="tel" name="tel" placeholder="955320750" required pattern="[\d]{9}" class=" os-animation visibility"  data-animation='flipInX'>
                        <label for="message" class=" os-animation visibility"  data-animation='flipInX'>Wiadomość</label>
                        <textarea name="message" id="message" required class=" os-animation visibility"  data-animation='flipInX'></textarea>
                        <div>    
                            <button type="submit" class="secondary-btn os-animation visibility"  data-animation='flipInX'>Wyślij</button>
                            <button type="reset" class="secondary-btn os-animation visibility"  data-animation='flipInX'>Wyczyść</button>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
    <footer>
        <div class="shadow-bg"></div>
        <div class="footer__body">
            <div class="wrapper">

                <div class="footer__address">
                    <h6 class="footer__header">Adres</h6>
                    <p>ul. Długa 1</p>
                    <p>31-431 Poznań</p>
                </div>

                <div class="footer__findus">
                    <h6 class="footer__header">Social Media</h6>
                    <div class="footer__socials">
                        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="footer__contact">
                    <h6 class="footer__header">Kontakt</h6>
                    <p>+48 668 210 648</p>
                    <p>example@mail.com</p>
                </div>
            </div>
        </div>
        <div class="whiteBlock whiteBlock--top-right"></div>
        <div class="whiteBlock whiteBlock--top-left"></div>
        <div class="footer__bottom"><p>© <span class="footer__year"></span> <a href="https://mavannkas.github.io" target="_blank"> Zmienić pózniej</a></p></div>
    </footer>

    <div class="loginPop">
        <div class="loginPop__body">

            <div class="loginPop__close"><i class="fas fa-times"></i></div>
            <h4 class="loginPop__header">Logowanie</h4>
            <form action="./panel/?lvl=login" method="POST">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" required>
                <label for="pass">Hasło</label>
                <input type="password" id="pass" name="pass" required>
                <button type="submit" class="secondary-btn">Zaloguj</button>
            </form>
            <a href="./panel/?lvl=register">Zarejestruj się</a>
        </div>
    </div>
    <div class="body-shadow"></div>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <script src="./js/anim.js"></script>
</body>
</html>