<?php
include_once 'db.php';
/**
 * Описание
 * 
 * Текст описания
 *
 * @package Backend
 * @category Basket
 * @author Coder RU <r-sasha@list.ru>
 * @version 1.1
 * @copyright Copyright (c) 2019, Coder RU
 */

    class Basket extends db{
    //Атрибуты
    private $good  ;
    private $price ;
    private $count ;
    private $size ;
    private $login ;
   
    //Методы
    function setGood(){
        echo $_REQUEST['title'];
        $this -> good = strip_tags($_REQUEST['title']);
        if($_REQUEST['title'] == ''){
            echo 'Метод не сработал';
        }
    }
    function getGood(){
        return $this -> good;
    }
    function setPrice(){
        $this -> price = strip_tags($_REQUEST['price']);
    }
    function getPrice(){
        return $this -> price;
    }
    function setCount(){
        $this -> count = strip_tags($_REQUEST['count']);
    }
    function getCount(){
        return $this -> count;
    }
    function setSize(){
        $this -> size = strip_tags($_REQUEST['size']);
    }
    function getSize(){
        return $this -> size;
    }
    function setImg(){
        $this -> img = strip_tags($_REQUEST['img']);
    }
    function getImg(){
        return $this -> img;
    }
    function setLogin(){
        $this -> login = strip_tags($_REQUEST['login']);
    }
    function getLogin(){
        return $this -> login;
    }
    function count_goods($connect){
        $USER = json_decode($_COOKIE['json']);
        $login = $USER -> login;
        $sql = 'SELECT COUNT(*) FROM basket WHERE user="'.$login.'"';
        $result = mysqli_query($connect, $sql); 
        if($result){
            $s = $result->fetch_assoc();
            return $s["COUNT(*)"];
        }else echo $sql;
    }
    function save($connect){
        $good = $this->getGood();
        $price = $this->getPrice();
        $count = $this->getCount();
        $size = $this->getSize();
        $img = $this->getImg();
        $login = $this->getLogin();

        $sql = "INSERT INTO `basket`(
                                `good`,   `price`,     `count`,   `size` , `img` , `user`
                            ) VALUES (  
                                '$good',  '$price' ,  '$count' , '$size' , '$img' , '$login'
                            )";
        $result = mysqli_query($connect, $sql); 
        if($result){
            echo 'Запрос успешно сработал';
        }else echo $sql;           
    }
    
    function listDisplay($connect){
        $USER = json_decode($_COOKIE['json']);
        $login = $USER -> login;
        $query = 'select * from basket WHERE user="'.$login.'"';
        $result = $connect->query($query);
        return $result;
        
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class='row'>";
                echo "<div class='col-sm-2'><img src='$row[img]'></div>";
                echo "<div class='col-sm-2'>".$row['good']."</div>";
                echo "<div class='col-sm-4'></div>";
                echo "<div class='col-sm-1'>".$row ['size']."</div>";
                echo "<div class='col-sm-1'>".$row ['count']."</div>";
                echo "<div class='col-sm-1'>".$row ['price']."</div>";
                echo "<div class='col-sm-1'>";
                    echo "<span class='del-item-basket'>х</span>";
                echo "</div>";
            echo "</div>";  
        }
    }

    function getAllGoods(){
        $connect = parent::extendConnect('localhost');
        $USER = json_decode($_COOKIE['json']);
        $login = $USER -> login;
        $query = 'select * from basket WHERE user="'.$login.'"';
        $result = $connect->query($query);
        return $result;
    }
    //Конструктор
    function __construct($count) {
        $linkFromParent = parent::extendConnect('localhost');
        if($count == 'count'){
            echo $this -> count_goods($linkFromParent);
        }
        if($count == 'save'){

            $this -> setGood();
            $this -> setPrice();
            $this -> setSize();
            $this -> setCount();
            $this -> setImg();
            $this -> setLogin();

            $this -> save($linkFromParent);
        }
        if($count == 'list'){
            //var_dump($this -> getGood());
            $this -> listDisplay($linkFromParent);
        }
        if($count == 'testscript'){
            echo "<script>alert('код js в php')</script>";
        }
        
    }
}

if($_REQUEST['title']){
    var_dump($_REQUEST);
    new Basket('save');
}
if($_POST)  
    echo 'post';
//new Basket('testscript');
?>