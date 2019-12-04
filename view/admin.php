<h1 class='admin__title'>Административная панель</h1>
<div class='container admin-panel'>
   
    <h4>Форма для добавления товара</h4>
    <form>
        <p><input placeholder='Наименование' name='title'></p>
        <p> <input placeholder='Цена' type='number' name='price'></p>
        <p><input placeholder='Артикул' name='article'></p>
        <p><textarea  placeholder='Описание' name='discr'>
        </textarea></p>
        <p class='admin-panel__container-img'><img src='http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/default.jpg'/></p>
        <p><input type='file'></p>
        <p><input type='submit'></p>
    </form>
</div>    
<?php 
//echo "Шаблона админки";