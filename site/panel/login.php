       
       <section>
            <div class="form">
                <p class="error--output">

        <?php
        include_once 'php/login_code.php';
        ?>
        </p>
                <h3 class="title">Logowanie</h3>
                <form action="./?lvl=login" method="POST" class="form__body">
                    <div class="form__input-box">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" required>
                    </div>
                    <div class="form__input-box">
                        <label for="password">Hasło</label>
                        <input type="password" id="password" name="pass" required>
                    </div>
                    <button type="submit" class="secondary-btn">Zaloguj się!</button>
                </form>
                <a href="./?lvl=register" class="form__footer">Zarejestruj się!</a>
                <a href="./?lvl=recovery" class="form__footer">Odzyskaj hasło!</a>
            </div>
        </section>