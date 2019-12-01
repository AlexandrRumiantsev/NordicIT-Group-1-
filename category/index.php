<?php 

$g_root = $_SERVER['DOCUMENT_ROOT'];
include_once($g_root.'/header.php');
include_once($g_root.'/model/db.php');
include_once($g_root.'/model/goods.php');

$goods = new goods;
if($_GET['type']){
        $list = $goods -> getCategory($_GET['type']);
}else $list = $goods -> getList();


//var_dump($list->fetch_assoc());
//$z = '"Тестова строка"'; 
//echo "<script>alert(".$z.")</script>"
//Вариант с присвоением данных в JS в PHP цикле.

//<header> <script>window.json[index] = <?=json_encode($row)
/*?></script> </header>*/

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
                                    <img src="http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/<?=$row['img']?>"/>
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