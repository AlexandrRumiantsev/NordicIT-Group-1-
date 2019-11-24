<?php
include_once 'db.php';
/**
* User , Модель юзера в базе данных
* 
* Развернутое описание
* 
* @имя_тега значение
* @return тип_данных
*/

class User extends db{
    //Атрибуты
    private $login ;
    private $password ;
    private $mail ;
    //Методы
    function setLogin(){
        $this -> login = strip_tags($_REQUEST['login']);
    }
    function getLogin(){
        return $this -> login;
    }
    function setPassword(){
        $this -> password = strip_tags($_REQUEST['password']);
    }
    function getPassword(){
        return $this -> password;
    }
    function setMail(){
        $this -> mail = strip_tags($_REQUEST['mail']);
    }
    function getMail(){
        return $this -> mail;
    }
    function save($connect){
        $log = $this->getLogin();
        $pass = $this->getPassword();
        $mail = $this->getMail();

        $sql = "INSERT INTO `users`  (
                    `login`, `password`,`name`, `mail` 
                ) 
                VALUES ( 
                    '$log', '$pass', 'myName' , '$mail'
                )";

        $result = mysqli_query($connect, $sql); 
        if($result){
            echo 'Запрос успешно сработал';
        }else echo $sql;           
    }
    //Конструктор
    function __construct() {
        if($_POST){
            $linkFromParent = parent::extendConnect('localhost');
            $this -> setLogin();
            $this -> setPassword();
            $this -> setMail();
            $this -> save($linkFromParent);
            
        }
    }
}
new User();
?>