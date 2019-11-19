<?php include_once "../header.php"; ?>

<style>
  html body .footer-info {
    margin-top: 0px;
  }
</style>   

<div class='container details-page'>

    <div class='container details-page__container-img'>
        <img src="http://<?php echo $_SERVER["SERVER_NAME"].'/img/catalog/9.jpg'?>">
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
        <span id='add_basket' data-value=''>
            Добавить в корзину
        </span>
    </div>
<?php 
include_once "../footer.php" 
?> 