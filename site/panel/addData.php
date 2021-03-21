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
