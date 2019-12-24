<?php  if($_SESSION["user_data"]["role"] == 'admin'): ?>
<h1 class='admin__title'>Административная панель</h1>
<div class='container admin-panel'>
   
    <h4>Форма для добавления товара</h4>
    <form enctype="multipart/form-data" id='save_good'>
        <p><input placeholder='Наименование' name='title'></p>
        <p> <input placeholder='Цена' type='number' name='price'></p>
        <p><input placeholder='Артикул' name='article'></p>
         <p>
             <select name='type'>
              <option value="men">Мужское</option>
              <option value="woman">Женское</option>
              <option value="children">Детям</option>
              <option value="new">Новинка</option>
            </select>
         </p>
        <p><textarea  placeholder='Описание' name='discr'>
        </textarea></p>
        <p class='admin-panel__container-img'><img src='http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/default.jpg'/></p>
        <span id='load_file'>Загрузить файл на сервер</span>
        <p><input type='file' multiple="multiple" id='pic' name='file'></p>
        <p><input  type='hidden'></p>
        <p><input type='submit'></p>
    </form>
</div>
<?php else: ?>
<h1> У вас нет прав доступа к данной странице! </h1>
<?php endif ?>