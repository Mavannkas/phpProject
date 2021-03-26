<?php if(session_status()==2):?>
        <section>
            <div class="profile-edit">
                <h3 class="title">Edycja Konta</h3>
                <div class="profile-edit__options">
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">Zmień zdjęcie profilowe</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST" class="profile-edit__form profile-edit__form--img"  enctype="multipart/form-data">
                            <img src="<?php 
                                if(file_exists('../user_img/'.$_SESSION['user'].'.png')){
                                    echo '../user_img/'.$_SESSION['user'].'.png';
                                }else{
                                    echo '../img/user.svg';
                                }
                                ?>" alt="profilowe" class="profile-edit__img" onerror="this.onerror=null; this.src='../img/user.svg'">
                            <label for="img-file">Wybierz zdjęcie profilowe</label>
                            <input type="file" name="img-file" id="img-file"  accept=".png,.jpg,.jpeg">
                            <input type="checkbox" name="img-del" id="img-del-file" hidden>
                            <div class="profile-edit__btn-box">
                                <button type="button" id='img-add' class="secondary-btn">Zapisz zdjęcie</button>
                                <button type="button" id='img-del' class="secondary-btn secondary-btn--danger">Usuń</button>
                            </div>
                        </form>
                        <?php
                            if(!empty($_FILES['img-file']['tmp_name']) || !empty($_POST['img-del'])){
                                include_once 'php/img.php';
                            }
                            ?>
                    </div>
                    <?php if(!isset($_SESSION['admin_data'])|| $_SESSION['admin_data']['id']==$_SESSION['id']):?>
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">HASŁO</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST"  class="profile-edit__form profile-edit__form--password" id="pass">
                            <div class="profile-edit__input-box">
                                <label for="oldPass">Stare Hasło</label><input type="password" id="oldPass" name="oldPass" required>
                            </div>
                            <div class="profile-edit__input-box">
                                <label for="pass-1">Nowe Hasło</label><input type="password" id="pass-1" name="pass" required>
                            </div>
                            <div class="profile-edit__input-box">
                                <label for="pass-2">Powtórz Hasło</label><input type="password" id="pass-2" required>
                            </div>
                            <div class="error"></div>
                            <button type="button" class="secondary-btn" id='change-pass-btn'>Zmień Hasło</button>
                        </form>
                        <?php 
                            if(!empty($_POST['oldPass']) || !empty($_POST['pass'])){
                                include_once 'php/change_password.php';
                            }
                            ?>
                    </div>
                    <?php endif;?>

                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">ZAAWANSOWANE</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST" class="profile-edit__form profile-edit__form--delete" id="del">
                            <p>Czy chcesz <span>nieodwracalnie usunąć</span> konto?</p>
                            <p>Procedura jest <span>nieodwracalna!</span></p>
                            <input type="checkbox" name="acc-del" id="acc-del-input" hidden>
                            <button type="button" class="secondary-btn secondary-btn--danger" id="acc-del-btn">Usuń konto</button>
                        </form>
                        <p class="success--output">
                        <?php 
                            if(!empty($_POST['acc-del'])){
                                include_once 'php/acc_del.php';
                            }
                            ?>
                        </p>
                    </div>
                    
                    <?php if(isset($_SESSION['admin_data']) && $_SESSION['admin_data']['id']!=$_SESSION['id']):?>

                    <?php if(isset($_SESSION['active']) && $_SESSION['active']=="0"):?>
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">Wyślij ponownie link aktywacyjny</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST" class="profile-edit__form profile-edit__form--delete" id="send">
                            <p>Konto jest dalej nieaktywne.</p>
                            <p>Chcesz wysłać ponownie link aktywacyjny?</p>
                            <input type="checkbox" name="send-mail" id="send-mail" hidden>
                            <button type="button" class="secondary-btn" id="send-btn">Wyślij</button>
                        </form>
                        <p class="success--output">
                            <?php 
                            if(!empty($_POST['send-mail'])){
                                include_once 'php/resend-mail.php';
                            }
                            ?>
                        </p>
                    </div>
                    <?php endif;?>

                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">EMAIL</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST"  class="profile-edit__form profile-edit__form--password" id="change-mail">
                            <div class="profile-edit__input-box">
                                <label for="newMail">Mail</label><input type="email" id="newMail" name="newMail" value="<?php echo $_SESSION['email']; ?>" required>
                            </div>

                            <button type="button" class="secondary-btn" id="change-mail-btn">Zmień email</button>
                        </form>
                        <?php 
                            if(!empty($_POST['newMail'])){
                                include_once 'php/change_mail.php';
                            }
                        ?>
                    </div>

                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">LOGIN</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST"  class="profile-edit__form profile-edit__form--password" id="change-login">
                            <div class="profile-edit__input-box">
                                <label for="login">Login</label><input type="test" id="login" name="login" value="<?php echo $_SESSION['user']; ?>" required>
                            </div>

                            <button type="button" class="secondary-btn" id="change-login-btn">Zmień login</button>
                        </form>
                        <?php 
                            if(!empty($_POST['login'])){
                                include_once 'php/change_login.php';
                            }
                        ?>
                    </div>
                    <?php endif;?>


                </div>
            <script src="../js/edit.js"></script>
            </div>
        </section>
<?php endif; ?>