<?php if(session_start()==2):?>
        <section>
            <div class="truncate">
                <h3 class="title">Usuń zawartość tabeli</h3>
                <form action="./?lvl=truncate" method="POST" class="form__body">
                    <p>Czy na pewno chcesz usunąć <span>całą</span> dodaną przez siebie zawartość tabeli?</p>
                    <p>Operacja jest <span>nieodwracalna!</span></p>
                    <input type="text" name="delete" hidden>
                    <button type="button" class="secondary-btn secondary-btn--danger">usuń</button>
                </form>
                <p class="success--output">
                <?php 
                if(isset($_POST['delete'])){
                    require_once "php/db.php";
                    $conn->select_db("m21358_makedb_user");
                    if($result=$conn->query("TRUNCATE user_$_SESSION[id]")){
                        $conn->select_db("makedb");
                        $conn->query("INSERT INTO db_truncate(user_id_fk) VALUES ($_SESSION[id])");
                        echo "Poprawnie wyczyszczono tabelę";
                    }
                    $conn->close();
                }
                ?>
                </p>
            </div>
            <script src="../js/truncate.js"></script>
        </section>
<?php endif; ?>