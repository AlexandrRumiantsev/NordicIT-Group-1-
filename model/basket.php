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
    public $good  ;
    public $price ;
    public $count ;
    public $size ;
    public $login ;
   
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
      
        //var_dump($_SESSION["user_data"]['login']);
        $this -> login = strip_tags($_SESSION["user_data"]['login']);
    }
    function getLogin(){
        return $this -> login;
    }
    function count_goods($connect){
        $USER = json_decode($_COOKIE['json']);
        $sql = 'SELECT COUNT(*) FROM basket WHERE user="'.$_SESSION["user_data"]["login"].'"';
        $result = mysqli_query($connect, $sql); 
        if($result){
            $s = $result->fetch_assoc();
            return $s["COUNT(*)"];
        }else echo $sql;
    }
    function save($item){
        $connect = parent::extendConnect('localhost');
        var_dump("save");
      
        
        $good = json_decode($item)->title;
        $price = json_decode($item)->price;
        $img = json_decode($item)->img;
        $login = json_decode($item)->user;
        $count = json_decode($item)->count;
        $size = json_decode($item)->size;
       
       
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
    
    function listDisplay(){
        // $USER = json_decode($_COOKIE['json']);
        
        $connect = parent::extendConnect('localhost');
        $login = $this -> login;
        $query = 'select * from basket WHERE user="'.$login.'"';
        $result = $connect->query($query);
        return $result;
        /*
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
      */
        
    }

    function getAllGoods(){
        $connect = parent::extendConnect('localhost');
        $USER = json_decode($_COOKIE['json']);
        $login = $USER -> login;
        //$query = 'select * from basket WHERE user="'.strip_tags($login).'"';
        $query = 'select * from basket left join goods on basket.good = goods.title  WHERE basket.user="'.strip_tags($login).'"';
        $result = $connect->query($query);
        return $result;
    }
    function delItemBasket($item){
        $connect = parent::extendConnect('localhost');
        $USER = json_decode($_COOKIE['json']);
        $login = $USER -> login;
        echo strip_tags($item);
        $query = 'DELETE FROM `basket` WHERE good="'.strip_tags($item).'"';

        $result = $connect->query($query);
        if($result){
     
        }echo $query;
        return $result;
    }
    
    //Конструктор
    function __construct($count='' , $good='') {
        
        $this -> setLogin();
        
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
            $this -> setLogin();
            $list = $this -> listDisplay($linkFromParent);
            return $list;
        }
        if($count == 'testscript'){
            echo "<script>alert('код js в php')</script>";
        }
        if($count == 'del'){
            //echo "удалить ".$good;
            $this -> delItemBasket($good);
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