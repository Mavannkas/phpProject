        <section>
            <div class="profile-edit">
                <h3 class="title">Edycja Konta</h3>
                <div class="profile-edit__options">
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">Zmień zdjęcie profilowe</h4>
                        <hr>
                        <form action="#" class="profile-edit__form profile-edit__form--img">
                            <img src="../img/user.svg" alt="profilowe" class="profile-edit__img">
                            <label for="img-file">Wybierz zdjęcie profilowe</label><input type="file" name="img-file" id="img-file">
                            <div class="profile-edit__btn-box">
                                <button type="button" class="secondary-btn">Zapisz zdjęcie</button>
                                <button type="button" class="secondary-btn secondary-btn--danger">Usuń</button>
                            </div>
                        </form>
                    </div>
                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">HASŁO</h4>
                        <hr>
                        <form action="#" class="profile-edit__form profile-edit__form--password">
                            <div class="profile-edit__input-box">
                                <label for="oldPass">Stare Hasło</label><input type="password" id="oldPass" name="oldPass" required>
                            </div>
                            <div class="profile-edit__input-box">
                                <label for="pass-1">Nowe Hasło</label><input type="password" id="pass-1" name="pass-1" required>
                            </div>
                            <div class="profile-edit__input-box">
                                <label for="pass-2">Powtórz Hasło</label><input type="password" id="pass-2" name="pass-2" required>
                            </div>
                            <div class="error"></div>
                            <button type="button" class="secondary-btn">Zmień Hasło</button>
                        </form>
                    </div>

                    <div class="profile-edit__option">
                        <h4 class="profile-edit__option-header">ZAAWANSOWANE</h4>
                        <hr>
                        <form action="#" class="profile-edit__form profile-edit__form--delete">
                            <p>Czy chcesz <span>nieodwracalnie usunąć</span> konto?</p>
                            <p>Procedura jest <span>nieodwracalna!</span></p>
                            <button type="button" class="secondary-btn secondary-btn--danger">Usuń konto</button>
                        </form>
                    </div>
                </div>
            <script src="../js/edit.js"></script>
            </div>
        </section>