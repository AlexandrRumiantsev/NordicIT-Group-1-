<main class='basket'>
      <h1> ВАША КОРЗИНА</h1>
      <span>товары резервируются на ограниченное время</span>
      <div class='container__basket row'>
        <div class='col-sm-2'>Фото</div>
        <div class='col-sm-2'>Наименование</div>
        <div class='col-sm-4'></div>
        <div class='col-sm-1'>Размер</div>
        <div class='col-sm-1'>Количество</div>
        <div class='col-sm-1'>Стоимость</div>
        <div class='col-sm-1'>Удалить</div>
      </div>
      <div id='content-basket'>
      <?php while($row = mysqli_fetch_array($arResult)):?>
            <div> <div class='row'>
                <div class='col-sm-2'><img src='<?=$row[img]?>'></div>
                <div class='col-sm-2'><?=$row['good']?></div>
                <div class='col-sm-4'></div>
                <div class='col-sm-1'><?=$row['size']?></div>
                <div class='col-sm-1'><?=$row['count']?></div>
                <div class='col-sm-1'><?=$row['price']?></div>
                <div class='col-sm-1'>
                   <span class='del-item-basket'>х</span>
                </div>
            </div>  
       <?php endwhile?> 
      </div>  
</main>