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
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">HASŁO</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST"  class="profile-edit__form profile-edit__form--password">
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
                            <button type="button" class="secondary-btn">Zmień Hasło</button>
                        </form>
                        <?php 
                            if(!empty($_POST['oldPass']) || !empty($_POST['pass'])){
                                include_once 'php/change_password.php';
                            }
                        ?>
                    </div>

                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">ZAAWANSOWANE</h4>
                        <hr>
                        <form action="./?lvl=edit" method="POST" class="profile-edit__form profile-edit__form--delete">
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
                </div>
            <script src="../js/edit.js"></script>
            </div>
        </section>