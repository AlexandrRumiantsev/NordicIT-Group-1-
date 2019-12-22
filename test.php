<?php
<<<<<<< HEAD
$login = 'alexweber';
$pass = 'NordicItSchool';
=======
$login = 'root';
$pass = 'root';
>>>>>>> e66d998e2a517bc4f3678365908603a16f606861
$name_base = 'magazine_lession';
$host = 'localhost';
$link = new mysqli($host, $login, $pass, $name_base);
// Переменная хранит число сообщений выводимых на станице
$num = 3;
// Извлекаем из URL текущую страницу
$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysqli_query($link, "SELECT COUNT(*) FROM goods");
$posts = mysqli_fetch_row($result) [0];
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if (empty($page) or $page < 0) $page = 1;
if ($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = mysqli_query($link, "SELECT * FROM goods LIMIT $start, $num");
// В цикле переносим результаты запроса в массив $postrow
while ($postrow[] = mysqli_fetch_array($result)) ?>

<?php
echo "<section>";
for ($i = 0;$i < $num;$i++) {
    echo "<pre>
         <p><img src='http://{$_SERVER["SERVER_NAME"]}:{$_SERVER['SERVER_PORT']}/img/catalog/{$postrow[$i]['img']}'</p>
         <p>" . $postrow[$i]['title'] . "</p>
         <p>" . $postrow[$i]['price'] . "</p>
      </pre>
      <p>" . $postrow[$i]['id'] . "</p>";
}
echo "</section>";
?>
<?php
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href= ./test.php?page=1><<</a>
                               <a href= ./test.php?page=' . ($page - 1) . '><</a> ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' <a href= ./test.php?page=' . ($page + 1) . '>></a>
                                   <a href= ./test.php?page=' . $total . '>>></a>';
// Находим две ближайшие станицы с обоих краев, если они есть
if ($page - 2 > 0) $page2left = ' <a href= ./test.php?page=' . ($page - 2) . '>' . ($page - 2) . '</a> | ';
if ($page - 1 > 0) $page1left = '<a href= ./test.php?page=' . ($page - 1) . '>' . ($page - 1) . '</a> | ';
if ($page + 2 <= $total) $page2right = ' | <a href= ./test.php?page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
if ($page + 1 <= $total) $page1right = ' | <a href= ./test.php?page=' . ($page + 1) . '>' . ($page + 1) . '</a>';
// Вывод меню
echo $pervpage . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $nextpage;
?>