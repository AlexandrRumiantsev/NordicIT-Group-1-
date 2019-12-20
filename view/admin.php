<h1 class='admin__title'>Административная панель</h1>
<div class='container admin-panel'>
   
    <h4>Форма для добавления товара</h4>
    <form id='save_good'>
        <p><input placeholder='Наименование' name='title'></p>
        <p> <input placeholder='Цена' type='number' name='price'></p>
        <p><input placeholder='Артикул' name='article'></p>
         <p>
             <select name='type'>
              <option value="man">Мужское</option>
              <option value="woman">Женское</option>
              <option value="children">Детям</option>
              <option value="new">Новинка</option>
            </select>
         </p>
        <p><textarea  placeholder='Описание' name='discr'>
        </textarea></p>
        <p class='admin-panel__container-img'><img src='http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/default.jpg'/></p>
        <p><input multiple type='file'></p>
        <p><input name='file' type='hidden'></p>
        <p><input type='submit'></p>
    </form>
</div>    
<?php 
//echo "Шаблона админки";