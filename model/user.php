<?php

/**
* Имя или краткое описание объекта
* 
* Развернутое описание
* 
* @имя_тега значение
* @return тип_данных
*/

class User{
    //Атрибуты

    //Методы

    //Конструктор

}
$login = strip_tags($_REQUEST['login']);
$password = strip_tags($_REQUEST['password']);
$name = strip_tags($_REQUEST['name']);

$sql = "INSERT INTO `users`  (`login`, `password`,`name`, `mail` ) VALUES (  '$login',  '$password' ,  '' , '')";

$link = mysqli_connect('localhost',  'root' , 'root' , 'magazine_lesson');
var_dump($link);
$result = mysqli_query($link, $sql);
//var_dump($result);
if($result){
    echo 'Запрос успешно сработал';
}else echo $sql;
  
?>