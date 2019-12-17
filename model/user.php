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
    function login($connect){
        $log = $_REQUEST['password'];
        $pass = $_REQUEST['login'];
        $sql = "SELECT * FROM `users` WHERE login = '$log' AND password = '{$pass}'";
        echo $sql;
        $result = mysqli_query($connect, $sql); 

        if($result){
            echo 'Запрос успешен!';
            while ($row = $result->fetch_assoc()) {
               $res = json_encode($row);
               setcookie('user', '');
               setcookie('user', $res);
            }
            
        }else echo $sql; 
    }
    function save($connect){
        $log = $this->getLogin();
        $pass = $this->getPassword();
        $mail = $this->getMail();

        $sql = "INSERT INTO `users`  (
                    `login`, `password`, `name` , `mail` , `role` 
                ) 
                VALUES ( 
                    '$log', '$pass', '' , '$mail' , 'user'
                )";

        $result = mysqli_query($connect, $sql); 
        if($result){
             echo 'Запрос успешно сработал';
             var_dump($result);
        } else echo $sql;           
    }
    function session_start(){
        /*
      Для сохранения авторизации на всех страницах
      используем механизм сессии.
      При каждом заходе на главную страницу, проверяется 
      сохраненная в куке переменная и происходит старт сессии.
      Для работы сессии на локальном сервере, необходимо поменять
      значения в php.ini:
         session.auto_start = 1
         session.cookie_lifetime = 1
      */
   
        $dataUserCookie = json_decode($_COOKIE["user"] , true);
        
        if( $dataUserCookie["login"] != '' ){
            session_start();
            $_COOKIE["login"] = $dataUserCookie["login"];
            $_SESSION['isAuth'] = true;
            $_SESSION['user_data'] =  $dataUserCookie;
            $_SESSION['login'] = $dataUserCookie["login"];
       }else $_SESSION['login'] = '';
    }
    //Конструктор
    function __construct($action = '') {
        $this -> setLogin();
        $this -> setPassword();

        if($action == 'autorize'){
            $linkFromParent = parent::extendConnect('localhost');
            $this -> login($linkFromParent);
        }
        else if($action == 'reg'){
            $this -> setMail();
            $linkFromParent = parent::extendConnect('localhost');
            
            $this -> save($linkFromParent);
            
        }
    }
}


?>