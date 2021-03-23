<?php if(session_status()==2):?>
        <section>
            <div class="form">
            <p class="error--output">
            <?php
            include_once 'php/register_code.php';
            ?>
            </p>
            
                <h3 class="title">Rejestracja</h3>
                <form action="./?lvl=register" method="POST"class="form__body">
                    <div class="form__input-box">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" required value="<?php if($bool) echo $login ?>">
                    </div>
                    <div class="form__input-box">
                        <label for="mail">Email</label>
                        <input type="email" id="mail" name="mail" required value="<?php if($bool) echo $mail ?>">
                    </div>
                    <div class="form__input-box">
                        <label for="password">Hasło</label>
                        <input type="password" id="password" name="password" required>
                        <i type="button" class="fas fa-question" id="tooltip" data-mdb-toggle="tooltip" title="Minimum 8 znaków, co najmniej 1 znak specjalny, wielka litera i cyfra">
                          </i>
                    </div>
                    <div class="form__input-box">
                        <label for="pass-test">Powtórz hasło</label>
                        <input type="password" id="pass-test" required>
                    </div>
                    <p class="error"></p>
                    <button type="button" class="secondary-btn">Zarejestruj się!</button>
                </form>
                <a href="./?lvl=login" class="form__footer">Zaloguj się!</a>
            </div>
            <script src="../js/reg.js"></script>
        </section>
<?php endif; ?>