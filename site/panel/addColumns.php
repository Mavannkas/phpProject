        <section>
            <div class="addColumns">
                <h3 class="title">Stwórz kolumny</h3>
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
                            <?php 
                                require_once 'php/get_columns.php';
                            ?>
                        </tbody>
                    </table>
                    <div class="btn-container"><button type="button" class="tabBtn add">+</button><button type="button" class="tabBtn del">-</button></div>
                    <div class="secondary-btn-box">
                        <button type="button" class="secondary-btn" id="submit">Zatwierdź</button>
                        <button type="button" class="secondary-btn secondary-btn--danger">Wyczyść</button>
                    </div>
                </form>
            </div>
            <script src="../js/addCols.js"></script>
        </section>
