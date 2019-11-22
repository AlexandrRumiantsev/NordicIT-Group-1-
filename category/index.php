<?php 
include_once "../header.php"; 
include_once "../model/db.php"; 
include_once "../model/goods.php"; 

$result = 
    new goods(
        new db('localhost')
    );
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

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/1.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар 111</p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                            <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/2.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/3.png'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header> </header>
                            <main>
                            <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/4.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header> </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/5.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/6.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header> </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/7.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/8.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/9.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img class='full' src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/10.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header> </header>
                            <main>
                                <img  src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/11.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        <div class='category-page__goods-list__item col-md-3 margin0_padding0'> 
                            <header>  </header>
                            <main>
                                <img class='full' src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/12.jpg'?>">
                            </main>
                            <footer> 
                                <p>Товар </p>
                                <p>Цена товара</p>
                            </footer>
                        </div>

                        </div>

                    </div>

                </div> 
            </main>
            <?php include_once "../footer.php" ?> 
        </div>
    </body>
</html>    