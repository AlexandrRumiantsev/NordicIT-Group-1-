<main class='basket'>
      <h1> ВАША КОРЗИНА</h1>
      <span class='basket__title'>товары резервируются на ограниченное время</span>
      <div class='container__basket row'>
        <div class='col-sm-2'>Фото</div>
        <div class='col-sm-2'>Наименование</div>
        <div class='col-sm-3'></div>
        <div class='col-sm-1'>Размер</div>
        <div class='col-sm-1'>Количество</div>
        <div class='col-sm-1'>Стоимость</div>
        <div class='col-sm-1'>Удалить</div>
      </div>
      <div id='content-basket'>

      <?php while ($row = mysqli_fetch_array($arResult)): ?>
            <div> 
              <div class='row'>
                <div class='col-sm-2'><img class='row__img' src='http://<?=$_SERVER["SERVER_NAME"]?>:<?=$_SERVER['SERVER_PORT']?>/img/catalog/<?=$row['img']?>'></div>
                <div class='row__title col-sm-2'>
                  <p><?=$row['good']?></p>
                  <p><?=$row['article']?></p>
                </div>
                <div class='col-sm-3'></div>
                <div class='row__size col-sm-1'><?=$row['size']?></div>
                <div class='row__count col-sm-1'>
                  <b class='minus-bsk'>-</b>
                    <span><?=$row['count']?></span>
                  <b class='add-bsk'>+</b>
                </div>
                <div class='row__price col-sm-1'><?=$row['price']?></div>
                <div class='col-sm-1'>
                   <span class='del-item-basket'>х</span>
             
            </div></div>
       <?php endwhile?>
      
      <div>
          <div class='bottom-basket'>
              <p>ИТОГО: <b id='summ'></b> руб.<p>
          </div>   
      <div>
      <span id='zakaz'>ОФОРМИТЬ ЗАКАЗ</span>
</main>