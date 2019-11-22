<?php
/**
* Имя или краткое описание объекта
* 
* Развернутое описание
* 
* @имя_тега значение
* @return тип_данных
*/
class goods extends db{
    function displayTemplate($res){
        while($row = mysqli_fetch_array($res))
        {?>
            <p>Наименование:<?=$row['title']?></p>
            <p>Цена:<?=$row['price']?></p>
        <?}
    }
    function getList($link){
        $query = "select * from goods";
        $result = $link->query($query);   
        $this -> displayTemplate($result);
    }
    function __construct($link) {
        $linkFromParent = parent::extendConnect('localhost');
        return $this -> getList($linkFromParent);
      }
}
