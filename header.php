<!DOCTYPE html>
<?php 
session_start();
error_reporting(1);
$g_root = $_SERVER['DOCUMENT_ROOT'];
include_once($g_root.'/model/basket.php');
include_once($g_root.'/functions.php');


?>
<script>
<?php include_once($g_root.'/functions.js'); ?>
</script>
<html>
    <head>
    <meta charset="utf-8">
    <!-- Настройка viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Подключаем Bootstrap CSS -->
     <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous"
     > 
     <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/style.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/webfonts/fa-solid-900.woff2">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     
    </head>
    <body>
        <div class='container'>
            <?php
                $USER = (array) json_decode($_COOKIE['json']);
                if(count($USER) != 0){
                     /*
                     Для сохранения авторизации на всех страницах
                     используем механизм сессии.
                     При каждом заходе на главную страницу, проверяется 
                     сохраненная в куке переменная и происходит старт сессии.
                     Для работы сессии на локальном сервере, необходимо поменять
                     значения в php.ini:
        
                        session.auto_start = 1
                        session.cookie_lifetime = 1

                     */
                     session_start();
                     $_SESSION['isAuth'] = true;
                     $_SESSION['user_data'] = $USER;
                     $_SESSION['login'] = $USER['login'];
                }else $_SESSION['login'] = '';
             ?>
            <header> 
                <div class='col-sm-1'> 
                    <span id='SH' class='container__SH'>
                        SH
                    </span>
                </div>
                <nav class='col-sm-8'>
                    <a href='/category'> Все </a>
                    <a href='/category?type=woman'> Женцинам </a>
                    <a href='/category?type=men'> Мужчинам </a>
                    <a href='/category?type=children'> Детям </a>
                    <a href='/category?type=new'> Новинки </a>
                    <a href='/about'> О нас </a>
                </nav>
                <div class='col-sm-3'>
                    <span class='container__enter' id='enter'> 
                        <img src=<?php echo 'http://'.$_SERVER['HTTP_HOST'] ."\img\icons\account.png"?>>  
                        <?php
                        if($_SESSION['login']){
                            echo "<span id='log'>" .$_SESSION['login'] ."</span>";
                        }else{
                            echo '<span>Войти</span>';
                        }    
                        ?>
                         
                    </span>
                    <span class='container__basket'>
                        <img src=<?php echo 'http://'.$_SERVER['HTTP_HOST'] ."\img\icons\bascet.png"?>> 
                        <?php if($_SERVER['PHP_SELF']=='/basket/index.php'):?>
                               <span class="container__basket__title">
                               Корзина(<?php new Basket('count') ?>)
                               </span>
                        <?php else: ?>
                            
                                <span id='title_basket'>Корзина</span>(
                                        <b data-value='0' id='target_basket'>
                                            <?php new Basket('count') ?>
                                        </b>
                                    )
        
                        <?php endif ?>    
                    </span>
                </div>    
            </header>
            <?php include_once($g_root.'/controller.php'); ?>