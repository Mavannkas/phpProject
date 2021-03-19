            <div class="add-data">

                <h3 class="title">Dodaj Krotki</h3>
                <form class="form__body">
                    <div class="form__body-container">
                        <table>
                            <thead>
                                <tr>
                                <?php 
                                require_once 'php/prepare_column_data.php';
                                ?>
                                    <!-- <th data-type="int" data-start="123" data-null="true">Nazwa</th>
                                    <th data-type="float" data-start="12.2" data-null="true">Typ</th>
                                    <th data-type="varchar" data-start="asd" data-null="true">Startowa wartość</th>
                                    <th data-type="text" data-start="asdas" data-null="false">NULL</th>
                                    <th data-type="date" data-start="2001-01-01" data-null="true">Primary</th>
                                    <th data-type="time" data-start="16:00" data-null="true">A.I</th>
                                    <th data-type="timestamp" data-start="1970-01-01T00:00:01" data-null="true">A.II</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="secondary-btn-box">
                        <button type="button" class="secondary-btn" id="submit">Zatwierdź</button>
                        <button type="reset" class="secondary-btn secondary-btn--danger">Wyczyść</button>
                    </div>
                </form>
                </div>
            

                    <script src="../js/addData.js"></script>
                </section>
