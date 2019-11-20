<?php
$good = strip_tags($_REQUEST['title']);
$price = strip_tags($_REQUEST['price']);
$count = strip_tags($_REQUEST['count']);
$size = strip_tags($_REQUEST['size']);

$sql = "INSERT INTO `basket`  (`good`, `price`,`count`, `size` ) VALUES (  '$good',  '$price' ,  '$count' , '$size')";
$link = mysqli_connect('localhost',  'root' , 'root' , 'magazine_lesson');
$result = mysqli_query($link, $sql);

if($result){
    echo 'Запрос успешно сработал';
}else echo $sql;
?>