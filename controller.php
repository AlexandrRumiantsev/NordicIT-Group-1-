<?php
//var_dump($_SERVER['REQUEST_URI']);

switch($_SERVER['REQUEST_URI']){

    case '/':
        echo 'Основная страница';
    break;

    case '/category/':
        echo 'Cтраница категорий';
    break;

    case '/category/?type='.$_GET['type']:
        echo 'Cтраница категорий-  Мужская';
    break;

    case '/basket/':
        echo 'Cтраница -  Корзина';
        $res = new Basket('list');
        $array = $res->getAllGoods();
        render("basket" , $array);
    break;

    case '/category/details/?id='.$_GET['id']:
        echo $_GET['id'];
    break;
    
}
