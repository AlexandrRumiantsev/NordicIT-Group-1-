<?php 
$g_root = $_SERVER['DOCUMENT_ROOT'];
include_once($g_root.'/header.php'); 

include_once($g_root.'/goods.php'); 
?>

<style>
  html body .footer-info {
    margin-top: 0px;
  }
</style>   
<div class='container details-page'>

    <div class='container details-page__container-img'>
        <img src="http://<?php echo $_SERVER["SERVER_NAME"].':8888/img/catalog/9.jpg'?>">
    </div>
    <div class='container details-page__title'>
        <h1>КЕДЫ С ПОЛОСКОЙ</h1>
    </div>
    <div class='container details-page__artikul'>
        <i>Артикул 34435345</i>
    </div>
    <div class='container details-page__price'>
        <i>12323123 руб.</i>
    </div>
    <div class='container details-page__discroption'>
       Отличные кеды  из водонипроницаемого материала. Отлично подходят для любой погоды. Приятно сидят на ноге, стильные и комфортные.
    </div>
      <p> Размер<p>
    <div class='container details-page__size'>
       
       <div class='container details-page__size__item'>
            38
       </div>
       <div class='container details-page__size__item'>
            39
       </div>
       <div class='container details-page__size__item'>
            43
       </div>
       <div class='container details-page__size__item'>
            28
       </div>
       <div class='container details-page__size__item'>
            41
       </div>
    </div>

</div>

    <div class='add-container'>
        <div>
            <span id='add-container__minuse'><i class="fas fa-minus-circle"></i></span>
            <span id='add-container__number'>0</span>
            <span id='add-container__plus'><i class="fas fa-plus-circle"></i></span>
        </div>
        <span id='add_basket' data-value=''>
            Добавить в корзину
        </span>
    </div>
<?php 
$g_root = $_SERVER['DOCUMENT_ROOT'];
include_once($g_root.'/footer.php'); 
?> 