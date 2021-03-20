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
                        <textarea name="query" id="query" placeholder="select * from $table where 1=1 ($table ma zawsze takie zostać)"></textarea>
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
                                <?php 
                                require_once 'php/prepare_column_data.php';
                                ?>
                            </tr>
                        </thead>
                        <tbody class="show-data">
                            <?php 
                            if(empty($_GET['query'])){
                                $query="select * from user_$_SESSION[id]";
                                $sourceQuery="";
                            }else{
                                $query=htmlspecialchars($_GET['query']);
                                $sourceQuery=trim($query);
                                $query=str_replace('$table', "user_$_SESSION[id]",trim($query), $count);
                                if($count!=1){
                                    $query="select * from user_$_SESSION[id]";
                                    $sourceQuery="";
                                }
                            }
                            if(empty($_GET['limit'])){
                                $limit=0;
                            }else{
                                $limit=intval(htmlspecialchars($_GET['limit']));
                            }

                            $query.=" LIMIT $limit,25";
                            include_once 'php/show_tuples.php';
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="tuple-number">
                <a href='./?lvl=showTable<?php echo "&limit=".($limit==0?0:$limit-25)."&query=$sourceQuery"?>' class="tuple-number__arrow" id="tuple-left-arrow">
                    ❮
                </a>
                <p class="tuple-number__interval">
                <?php 
                echo ($limit+1)."-".($limit+25);
                ?>
                </p>
                <a href='./?lvl=showTable<?php echo "&limit=".($limit+25)."&query=$sourceQuery"?>' class="tuple-number__arrow" id="tuple-right-arrow">
                    ❯
                </a>
            </div>
            <script src="../js/editData.js"></script>
        </section>