<?php 

while ($row = $arResult->fetch_assoc()) {
?>

    
    
<div class='container details-page'>

<div class='container details-page__container-img'>
    <img src="http://<?=$_SERVER["SERVER_NAME"]?>:8888/img/catalog/<?=$row["img"]?>">
</div>
<div class='container details-page__title'>
    <h1><?=$row["title"]?></h1>
</div>
<div class='container details-page__artikul'>
    <i>Артикул <?=$row["article"]?></i>
</div>
<div class='container details-page__price'>
    <i>Цена <?=$row["price"]?></i>
</div>
<div class='container details-page__discroption'>
   Описание <?=$row["discr"]?>
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
}
?>

   <!--    
<div class='container details-page'>

<div class='container details-page__container-img'>
    <img src="http://<?php //echo $_SERVER["SERVER_NAME"].':8888/img/catalog/default.jpg'?>">
</div>
<div class='container details-page__title'>
    <h1>Шаблон для детализации товара</h1>
</div>
<div class='container details-page__artikul'>
    <i>Артикул ......</i>
</div>
<div class='container details-page__price'>
    <i>Цена ........</i>
</div>
<div class='container details-page__discroption'>
   Описание.........
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
-->