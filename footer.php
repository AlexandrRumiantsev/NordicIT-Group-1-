<?php
include_once __DIR__ . '/model/goods.php';
$goods = new goods;
?>
             <footer>
                <div class='footer-info'>
                    <div class='col-sm-4'>
                        КОЛЛЕКЦИИ
                        <div>
                        <a target='_blank' href='/category/?type=woman'>
                            Женцинам
                        </a>
                            (<?=$goods->getCountCategory('woman')?>)
                        </div>
                        <div>
                        <a target='_blank' href='/category/?type=men'>
                            Мужчинам
                        </a>
                            (<?=$goods->getCountCategory('men')?>)</div>
                        <div>
                        <a target='_blank' href='/category/?type=children'>
                            Детям
                        </a>
                        (<?=$goods->getCountCategory('children')?>)</div>
                        <div>
                        <a target='_blank' href='/category/?type=new'>
                            Новинки
                        </a>
                        (<?=$goods->getCountCategory('new')?>)</div>
                    </div>
                    <div class='col-sm-4'>
                        МАГАЗИН
                        <div><a target='_blank' href='/about'>О нас</a></div>
                        <div><a target='_blank' href='/send'>Доставка</a></div>
                        <div><a target='_blank' href='/work'>Работай с нами</a></div>
                        <div><a target='_blank' href='/contact'>Контакты</a></div>
                    </div>
                    <div class='col-sm-4'>
                        МЫ В СОЦИАЛЬНЫХ СЕТЯХ
                        <div>Сайт разработан в
                            <a href='https://inordic.ru' target='_blank'>INordic.ru</a>
                        </div>
                        <div>2018 . Все права защищены</div>
                        <div class='footer-info__icons-social'>
                            <div class='footer-info__icons-social__item'> <i class="fab fa-twitter"></i> </div>
                            <div class='footer-info__icons-social__item'> <i class="fab fa-facebook-square"></i></div>
                            <div class='footer-info__icons-social__item'> <i class="fab fa-instagram"></i></div>
                        </div>
                    </div>
                </div>
            </footer>
           
            <script src="http://<?=$_SERVER['HTTP_HOST']?>/controller.js"></script>