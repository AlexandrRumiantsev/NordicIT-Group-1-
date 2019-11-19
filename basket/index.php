<section class='container'>
<header>
       <?php 
            include_once "../header.php";
       ?>
</header>
<main class='basket'>
      <h1> ВАША КОРЗИНА </h1>
      <span>товары резервируются на ограниченное время</span>
      <div class='container__basket row'>
        <div class='col-sm-2'>Фото</div>
        <div class='col-sm-2'>Наименование</div>
        <div class='col-sm-4'>3</div>
        <div class='col-sm-1'>Размер</div>
        <div class='col-sm-1'>Количество</div>
        <div class='col-sm-1'>Стоимость</div>
        <div class='col-sm-1'>Удалить</div>
      </div>
      <div id='content-basket'>

      </div>
     
</main>
<footer>
    <script>
    /*
     <div class='row'>
        <div class='col-sm-2'>
            Фото
        </div>
        <div class='col-sm-2'>
        </div>
        <div class='col-sm-4'>
            3
        </div>
        <div class='col-sm-1'>
            Размер
        </div>
        <div class='col-sm-1'>
            Количество
        </div>
        <div class='col-sm-1'>
            Стоимость
        </div>
        <div class='col-sm-1'>
            Удалить
        </div>
      </div>
      */
       document.getElementById('content-basket');
       console.log(localStorage);
     </script>
    <?php include_once "../footer.php"?>
</footer>
</section>