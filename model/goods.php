<?php
include_once 'db.php';

/**
* @author Александр Румянцев <r-sasha@list.ua>
* @version 1.0
* @subpackage classes
* Класс goods, отвечает за работу с таблицей goods, в нашей базе данных.
*/
class goods extends db{
     /** 
      * Шаблон пагинации
     */
     public $pagination; 
     
     /**
     * Метод для сохранения данных из админки в таблице goods 
     * 
     * Данный метод принимает данные из формы административной панели и ajax запросом отправляет через контролллер в таблицу goods, текущей БД.
     *
     * @param string $item - JSON массив Данных записываемый из админки.
     *
     * @return null
     */
     function save($item){
        var_dump("save");
        $good = json_decode($item)->title;
        $price = json_decode($item)->price;
        $img = json_decode($item)->img;
        $discription = json_decode($item)->discription;
        $artikul = json_decode($item)->artikul;
        $id = uniqid();
        $type = json_decode($item)->type;
        $connect =  parent::extendConnect('localhost');
       
        $sql = "INSERT INTO `goods`(
                                 `id` , `title`,   `price`,     `img`  , `discr` , `article` , `category`
                            ) VALUES (  
                                '$id' , '$good',  '$price' ,  '$img' , '$discription' , '$artikul' , '$type'
                            )";
                        
        $result = mysqli_query($connect, $sql); 
        if($result){
            echo 'Запрос успешно сработал';
        }else echo $sql .'ERRROR';      
    }
    
    /**
     * Возвращает один определеннный элемент из БД
     * 
     * Реализует подключение из родительского класса и делает запрос по параметру в БД.
     *
     * @param string $id уникальный идентификатор товара в таблице БД.
     * 
     * @return object $result - объект получаемый в результате запроса к БД
     */
    function getItem($id){
        $linkFromParent = parent::extendConnect('localhost');
        $query = "select * from goods where id='".$id."'";
        $result = $linkFromParent->query($query); 
        
        return $result;
    }

    /**
     * Возвращает все товары
     * 
     * Возвращает все товары из БД и реализует механизм пагинации
     *
     * @return object $result - объект получаемый в результате запроса к БД
     */
    function getList(){
        $link = parent::extendConnect('localhost');
        // Переменная хранит число сообщений выводимых на станице
        $num = 4;
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
        // Проверяем нужны ли стрелки назад
        if ($page != 1) $pervpage = '<a href= ./?page=1><<</a>
                                    <a href= ./?page=' . ($page - 1) . '><</a> ';
        // Проверяем нужны ли стрелки вперед
        if ($page != $total) $nextpage = ' <a href= ./?page=' . ($page + 1) . '>></a>
                                        <a href= ./?page=' . $total . '>>></a>';
        // Находим две ближайшие станицы с обоих краев, если они есть
        if ($page - 2 > 0) $page2left = ' <a href= ./?page=' . ($page - 2) . '>' . ($page - 2) . '</a> | ';
        if ($page - 1 > 0) $page1left = '<a href= ./?page=' . ($page - 1) . '>' . ($page - 1) . '</a> | ';
        if ($page + 2 <= $total) $page2right = ' | <a href= ./?page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
        if ($page + 1 <= $total) $page1right = ' | <a href= ./?page=' . ($page + 1) . '>' . ($page + 1) . '</a>';
        // Вывод меню
        $this -> setPagination($pervpage , $page2left , $page1left , $page , $page1right , $page2right , $nextpage);

      return $result;
    }

    /**
     * Краткое описание функции
     * 
     * Подробное описание функции, если необходимо 
     *
     * @param string $param1 Первый параметр функции
     * @param string $param2 Второй параметр
     * @return string
     */
    function setPagination($pervpage , $page2left , $page1left , $page , $page1right , $page2right , $nextpage){
        $this -> pagination = $pervpage . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $nextpage;
    }

    /**
     * Краткое описание функции
     * 
     * Подробное описание функции, если необходимо 
     *
     * @param string $param1 Первый параметр функции
     * @param string $param2 Второй параметр
     * @return string
     */
    function getPagination(){
        return $this -> pagination;
    }

    /**
     * Краткое описание функции
     * 
     * Подробное описание функции, если необходимо 
     *
     * @param string $param1 Первый параметр функции
     * @param string $param2 Второй параметр
     * @return string
     */
    function getCategory($type){
       
        $linkFromParent = parent::extendConnect('localhost');
        
        
        // Переменная хранит число сообщений выводимых на станице
        $num = 4;
        // Извлекаем из URL текущую страницу
        $page = $_GET['page'];
        // Определяем общее число сообщений в базе данных
        $result = mysqli_query($linkFromParent, "SELECT COUNT(*) FROM goods WHERE category='$type'");
         
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
        
        $query = "select * from goods WHERE category='$type' LIMIT $start, $num";
       
        $result = $linkFromParent->query($query); 
        
        // Проверяем нужны ли стрелки назад
        if ($page != 1) $pervpage = '<a href= ./?type='.$type.'&page=1><<</a>
                                    <a href= ./?type='.$type.'&page=' . ($page - 1) . '><</a> ';
        // Проверяем нужны ли стрелки вперед
        if ($page != $total) $nextpage = ' <a href= ./?type='.$type.'&page=' . ($page + 1) . '>></a>
                                        <a href= ./?type='.$type.'&page=' . $total . '>>></a>';
        // Находим две ближайшие станицы с обоих краев, если они есть
        if ($page - 2 > 0) $page2left = ' <a href= ./?type='.$type.'&page=' . ($page - 2) . '>' . ($page - 2) . '</a> | ';
        if ($page - 1 > 0) $page1left = '<a href= ./?type='.$type.'&page=' . ($page - 1) . '>' . ($page - 1) . '</a> | ';
        if ($page + 2 <= $total) $page2right = ' | <a href= ./?type='.$type.'&page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
        if ($page + 1 <= $total) $page1right = ' | <a href= ./?type='.$type.'&page=' . ($page + 1) . '>' . ($page + 1) . '</a>';
        // Вывод меню
        $this -> setPagination($pervpage , $page2left , $page1left , $page , $page1right , $page2right , $nextpage);
        
        return $result;
    }

    /**
     * Краткое описание функции
     * 
     * Подробное описание функции, если необходимо 
     *
     * @param string $param1 Первый параметр функции
     * @param string $param2 Второй параметр
     * @return string
     */
    function getCountCategory($type){
        $linkFromParent = parent::extendConnect('localhost');
        $sql = 'SELECT COUNT(*) FROM goods WHERE category="'.$type.'"';
        $result = mysqli_query($linkFromParent, $sql); 
        if($result){
            $s = $result->fetch_assoc();
            return $s["COUNT(*)"];
        }else echo $sql;
    }
    
}
     