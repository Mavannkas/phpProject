        <section class="show-data-section">
            <div class=advanced-query>
                <h3 class="title">Zapytanie SQL</h3>
                <form class="advanced-query__form">
                    <p>Zaznacz aby wyświetlić formularz</p>
                    <div class="advanced-query__checkbox-box checkboxContainer">
                        <input type="checkbox" name="isAdv" id="isAdv">
                        <label for="isAdv"></label>
                    </div>
                    <div class="advanced-query__input-area hidden">
                        <textarea name="query" id="query"></textarea>
                        <div class="advanced-query__btn-box">
                            <button type="submit" class="secondary-btn">Zatwierdź</button>
                            <button type="reset" class="secondary-btn" id='reset-area'>Wyczyść</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="addColumns">
                <h3 class="title">Podgląd zawartości</h3>
                <form class="form__body show">
                    <table>
                        <thead>
                            <tr>
                                <th>Numer</th>
                                <th>Imie</th>
                                <th>Nazwisko sdfsdfsddfgdfgdfgdfgdfgdfgdfg</th>
                                <th>Nazwisko</th>
                                <th>Nazwisko</th>
                                <th>Nazwisko</th>
                                <th>Nazwisko</th>
                            </tr>
                        </thead>
                        <tbody class="show-data">
                            <tr id="tuple-1">
                                <td data-type="int">1000</td>
                                <td data-type="float">200.12</td>
                                <td data-type="varchar">słowo max 255 znaków</td>
                                <td data-type="text">Tekst max 65tys znaków </td>
                                <td data-type="date">1999-12-20</td>
                                <td data-type="time">20:59:59</td>
                                <td data-type="timestamp">1971-01-01 00:00:00</td>
                            </tr>
                            <tr id="tuple-2">
                                <td data-type="int">1000</td>
                                <td data-type="float">200.12</td>
                                <td data-type="varchar">słowo max 255 znaków</td>
                                <td data-type="text">Tekst max 65tys znaków </td>
                                <td data-type="date">1999-12-20</td>
                                <td data-type="time">00:59:59</td>
                                <td data-type="timestamp">1970-01-01 00:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="tuple-number">
                <button class="tuple-number__arrow" id="tuple-left-arrow">
                    ❮
                </button>
                <p class="tuple-number__interval">1-25</p>
                <button class="tuple-number__arrow" id="tuple-right-arrow">
                    ❯
                </button>
            </div>
            <script src="../js/editData.js"></script>
        </section>