        <section>
            <div class="addColumns">
                <h3 class="title">Edytuj kolumnę</h3>
                <form action="./?lvl=editColumn" method="POST" class="form__body--small">
                    <label for="col">Wybierz którą</label>
                    <select name="col" id="col">
                        <?php 
                            require_once 'php/get_columns_name.php';
                        ?>
                    </select>
                    <input type="radio" name='delete' hidden>
                    <div class="secondary-btn-box">
                        <button type="submit" class="secondary-btn">Pobierz</button>
                        <button type="button" class="secondary-btn secondary-btn--danger">Usuń</button>
                    </div>
                </form>
                <?php 
                if(!empty($_POST['col'])){
                    if(!empty($_POST['delete'])){
                        $conn->select_db('makedb_user');
                        $sql="ALTER TABLE user_$_SESSION[id] DROP `$_POST[col]`";
                        $result=$conn->query($sql);
                        if($result){
                            echo "<p class='success--output'>Poprawnie usunięto $_POST[col]</p>";
                        }else{
                            echo "<p class='error--output'>Nie udało się usunąć $_POST[col]</p>";
                        }

                    }
                }
                ?>
                <form class="form__body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Typ</th>
                                <th>Startowa wartość</th>
                                <th>NULL</th>
                                <th>Unique</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="secondary-btn-box">
                        <button type="button" class="secondary-btn" id="submit">Zatwierdź</button>
                        <button type="reset" class="secondary-btn secondary-btn--danger">Wyczyść</button>
                    </div>
                </form>
            </div>
            <script src="../js/editColumn.js"><script>
        </section>
