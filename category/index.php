<?php 
$g_root = $_SERVER['DOCUMENT_ROOT'];
include_once($g_root.'/header.php');
include_once($g_root.'/model/db.php');
include_once($g_root.'/model/goods.php');

$goods = new goods;
$list = $goods -> getList();
?> 

<main> 
                <div class='category-page wraper'> 

                        <h1>Мужчинам</h1>
                    <div class='wraper__slogan'>Все товары</div>
                    <div class='wraper__input-container'> 
                        <div class='wraper__input-container__item'><input placeholder='Категория'/></div>
                        <div class='wraper__input-container__item'><input placeholder='Размер'/></div>
                        <div class='wraper__input-container__item'><input placeholder='Стоимость'/></div>
                    </div>  

                    <div class='category-page__goods-list container'>

                        <div class='row'>
                        <?php
                        while ($row = $list->fetch_assoc()) 
                            {?> 
                            <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                                <header> <?=json_encode($row)?> </header>
                                <main>
                                    <img src="http://<?=$_SERVER["SERVER_NAME"]?>:8888/img/catalog/<?=$row['img']?>"/>
                                </main>
                                <footer> 
                                    <p><?=$row["title"]?></p>
                                    <p><?=$row["price"]?></p>
                                </footer>
                            </div>    
                        <?php } ?>
                        

                        </div>

                    </div>

                </div> 
            </main>
            <?php include_once "../footer.php" ?> 
        </div>
    </body>
</html>    