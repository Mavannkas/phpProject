<?php if(session_status()==2):?>
        <section>
        <div class="form">
        <?php
        include_once 'php/recovery_code.php';
        ?>

                <h3 class="title">Odzyskiwanie</h3>
                <form action="./?lvl=recovery" method="POST" class="form__body">
                    <div class="form__input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <button type="submit" class="secondary-btn">Odzyskaj</button>
                </form>
                <a href="./?lvl=login" class="form__footer">Zaloguj się!</a>
            </div>
        </section>
<?php endif; ?>