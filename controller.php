<?php
//var_dump($_SERVER['REQUEST_URI']);

switch($_SERVER['REQUEST_URI']){

    case '/':
        echo 'Основная страница';
    break;

    case '/category/':
        echo 'Cтраница категорий';
    break;

    case '/category/?type=woman':
        echo 'Cтраница категорий -  Женская';
    break;

    case '/category/?type=children':
        echo 'Cтраница категорий -   Для детей';
    break;

    case '/category/?type=new':
        echo 'Cтраница категорий -  Новинки';
    break;

    case '/category/?type=men':
        echo 'Cтраница категорий-  Мужская';
    break;

    case '/basket/':
        echo 'Cтраница -  Корзина';
        $res = new Basket('list');
        $array = $res->getAllGoods();
        render("basket" , $array);
    break;
    
}
