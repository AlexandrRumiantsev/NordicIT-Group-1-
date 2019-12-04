<?php
//var_dump($arResult);
?>
            <main>
                <div class='category-page wraper'>
                        <h1> <?=$title?></h1>
                    <div class='wraper__slogan'>Все товары</div>
                    <div class='wraper__input-container'>
                        <div class='wraper__input-container__item'>
                            <input placeholder='Категория'/>
                        </div>
                        <div class='wraper__input-container__item'>
                            <input placeholder='Размер'/>
                        </div>
                        <div class='wraper__input-container__item'>
                            <input placeholder='Стоимость'/>
                        </div>
                    </div>

                    <div class='category-page__goods-list container'>

                        <div class='row'>
                        <?php while ($row = $arResult->fetch_assoc()) {?>
                            <?var_dump($row)?>
                            <div class='goods-list__item col-md-3 margin0_padding0'>
                                <header> <?=json_encode($row)?> </header>
                                <main>
                                    <img src="http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/<?=$row['img']?>"/>
                                </main>
                                <footer>
                                    <p><?=$row["title"]?></p>
                                    <p class='item__price'><?=$row["price"]?></p>
                                </footer>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </main>