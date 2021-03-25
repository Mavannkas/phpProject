<?php if(session_status()==2 && $_SESSION['admin']==1):?>
    <section>
        <div class="addColumns admin">
            
            <h3 class="title">Wybierz użytkownika</h3>
                <form action="./?lvl=admin" method="POST" class="form__body">
                    <div class="filter-options">
                        <label for="filtered-text">Filtruj po nicku</label>
                        <input type="text" id="filtered-text">
                        <label for="isActive">Tylko nieaktywowani</label>
                        <div class="checkboxContainer">
                            <input type="checkbox" id="isActive">
                            <label for="isActive"></label>
                        </div>
                    </div>
                    <div class="select-box">
                        <label for="col">Użytkownicy</label>
                        <select name="user" id="col" size="6">
                            <?php 
                            require_once 'php/get_usernames.php';
                            ?>
                        </select>
                    </div>
                    <input type="radio" name='erase' hidden>
                    <p class='success--output'>jesteś zalogowany jako<br>
                    <b>
                    <?php
                        require_once 'php/change_user.php';
                        echo $_SESSION['user'];
                    ?>
                    </b>
                    </p>
                    <div class="secondary-btn-box">
                        <button type="submit" class="secondary-btn">Przeloguj</button>
                        <button type="button" class="secondary-btn secondary-btn--danger">Wyczyść</button>
                    </div>
                </form>
        </div>
    <script src="../js/admin.js"></script>
    </section>
<?php endif; ?>
